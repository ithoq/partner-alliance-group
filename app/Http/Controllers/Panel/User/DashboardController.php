<?php

namespace Vanguard\Http\Controllers\Panel\User;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Activity\ActivityRepository;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Support\Enum\UserStatus;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    
    private $users;
    /**
     * @var ActivityRepository
     */
    private $activities;

    /**
     * DashboardController constructor.
     * @param UserRepository $users
     * @param ActivityRepository $activities
     */
    public function __construct(UserRepository $users, ActivityRepository $activities)
    {
        $this->middleware('auth');
        $this->users = $users;
        $this->activities = $activities;

    }    
    
    public function index() {
        
        $activities = $this->activities->userActivityForPeriod(
            Auth::user()->id,
            Carbon::now()->subWeeks(2),
            Carbon::now()
        )->toArray();       
        
        $panel = [
            'type' => 'user',
            'section' => 'dashboard'
        ];
        
        # Set Data
        $data['user'] = Auth::user();
      
        return view('panel.user.dashboard', compact('activities', 'panel'))->with($data);
        
    }
    
}
