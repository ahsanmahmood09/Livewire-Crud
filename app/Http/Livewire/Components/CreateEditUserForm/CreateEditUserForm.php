<?php

namespace App\Http\Livewire\Components\CreateEditUserForm;

use App\Services\InterestServices\InterestServices;
use App\Services\UserServices\UserServices;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use LivewireUI\Modal\ModalComponent;

class CreateEditUserForm extends ModalComponent
{
    protected $userServices;

    protected $interestServices;

    public $heading;

    public $interests = [];

    public $name;

    public $email;

    public $surname;

    public $mobile_number;

    public $dob;

    public $language;

    public $south_african_id;

    public $user;

    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile_number' => 'required|max:13',
            'dob' => 'required|date',
            'language' => 'required',
            'south_african_id' => 'required',
            'interests' => 'required|array',
        ];
    }

    /**
     * Summary of boot
     * @param  UserServices  $userServices
     * @param  InterestServices  $interestServices
     * @return void
     */
    public function boot(UserServices $userServices, InterestServices $interestServices)
    {
        $this->userServices = $userServices;
        $this->interestServices = $interestServices;
    }

    /**
     * @param int|null $userId
     * @return string|void
     */
    public function mount(int $userId = null)
    {
        if ($userId) {
            $this->user = $this->userServices->findOneUserById($userId)[0];

            $this->name             = $this->user->name;
            $this->surname          = $this->user->surname;
            $this->email            = $this->user->email;
            $this->dob              = $this->user->dob;
            $this->language         = $this->user->language;
            $this->mobile_number    = $this->user->mobile_number;
            $this->south_african_id = $this->user->south_african_id;
            $this->interests        = $this->user->interests->pluck('id');

            return $this->heading = 'Update User';
        }

        $this->heading = 'Add User';
    }

    /**
     * @return mixed
     */
    public function getAllInterestsProperty()
    {
        return $this->interestServices->getAllInterests();
    }

    /**
     * @return void
     */
    private function attachUserInterests()
    {
        $this->user->interests()->sync($this->interests);
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function submit()
    {
        $userData = $this->validate();
        unset($userData['interests']);

        if (! $this->user)
        {
            $userData['password'] = Hash::make('12345678');
            $this->user = $this->userServices->createUser($userData);

            $message = "The user has been added successfully";
        }
        else {
            $this->user = $this->userServices->updateUser($userData, $this->user->id);
            $message = "The user has been edited successfully";
        }

        $this->attachUserInterests();

        Session::flash(
            'primary',
            $message
        );

        return redirect(route('dashboard'));
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('livewire.components.create-edit-user-form.create-edit-user-form');
    }
}
