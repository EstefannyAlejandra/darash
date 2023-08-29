<?php

namespace App\Policies;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;


class EventosPolicy extends ServiceProvider
{
    use HandlesAuthorization;

      /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Evento $evento)
    {
       
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Evento $evento)
    {
        dd($user->id === $evento -> user_id);
       // return $user->id === $evento -> user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Evento $evento)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Evento $evento)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Evento $evento)
    {
        //
    }
}
