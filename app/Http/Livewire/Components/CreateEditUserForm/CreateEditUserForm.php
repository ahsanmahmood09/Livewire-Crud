<?php

namespace App\Http\Livewire\Components\CreateEditUserForm;

use App\Services\UserServices\UserServices;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class CreateEditUserForm extends ModalComponent
{
    protected $userServices;

    public $heading;

    public $interests = [];

    public $name;

    public $email;

    public $password;

    public $surname;

    public $mobile_number;

    public $dob;

    public $language;

    public $south_african_id;


    /**
     * Summary of boot
     * @param UserServices $userServices
     * @return void
     */
    public function boot(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    /**
     * @param int|null $userId
     * @return string|void
     */
    public function mount(int $userId = null)
    {
        if ($userId) {
            $user = $this->userServices->findOneUserById($userId)[0];
            $this->name = $user->name;
            $this->surname = $user->surname;
            $this->email = $user->email;
            $this->dob = $user->dob;
            $this->language = $user->language;
            $this->mobile_number = $user->mobile_number;
            $this->south_african_id = $user->south_african_id;
            $this->interests = $user->interests->toArray();
            return $this->heading = 'Update User';
        }
        $this->heading = 'Add User';
    }

    /**
     * @return array
     */
    protected function rules()
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required',
            'dob' => 'required',
            'language' => 'required',
            'south_african_id' => 'required',
            'interests' => 'required',
        ];
    }

    /**
     * @return void
     */
    public function submit()
    {
        $data = $this->validate();

        $this->userServices->createUser($data);
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('livewire.components.create-edit-user-form.create-edit-user-form');
    }
}
