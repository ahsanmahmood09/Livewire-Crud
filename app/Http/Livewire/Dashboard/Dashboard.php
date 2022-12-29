<?php

namespace App\Http\Livewire\Dashboard;

use App\Services\UserServices\UserServices;
use Livewire\Component;

class Dashboard extends Component
{
    protected $userServices;

    public $searchByEmail = '';

    public $perPage = 5;

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
     * Summary of getAllUsersProperty
     * @return mixed
     */
    public function getAllUsersProperty()
    {
        return $this->userServices->getAllUsersPaginatedResults(
            $this->perPage,
            $this->searchByEmail,
            ['interests']
        );
    }

    /**
     * @return mixed
     */
    public function render()
    {
        return view('livewire.dashboard.dashboard')
            ->extends('layouts.app')
            ->section('content');
    }
}
