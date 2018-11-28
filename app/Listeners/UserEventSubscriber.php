<?php

namespace App\Listeners;

class UserEventSubscriber
{
    /**
     * Handle user auth failed events.
     *
     * @param  object  $event
     * @return void
     */
    public function onUserAuthFailed(\Illuminate\Auth\Events\Failed $event)
    {
        $this->logEvent('failed to log in', $event);
    }

    /**
     * Handle user lockout events.
     *
     * @param  object  $event
     * @return void
     */
    public function onUserLockout(\Illuminate\Auth\Events\Lockout $event)
    {
        $fingerprint = ((bool) $event->request->route()) ? " ({$event->request->fingerprint()})" : '';

        activity('auth')->log("Client locked out: {$event->request->ip()} using {$event->request->userAgent()}{$fingerprint}");
    }

    /**
     * Handle user login events.
     *
     * @param  object  $event
     * @return void
     */
    public function onUserLogin(\Illuminate\Auth\Events\Login $event)
    {
        $this->logEvent('logged in', $event);
    }

    /**
     * Handle user logout events.
     *
     * @param  object  $event
     * @return void
     */
    public function onUserLogout(\Illuminate\Auth\Events\Logout $event)
    {
        $this->logEvent('logged out', $event);
    }

    /**
     * Handle user password reset events.
     *
     * @param  object  $event
     * @return void
     */
    public function onPasswordReset(\Illuminate\Auth\Events\PasswordReset $event)
    {
        $this->logEvent('reset their password', $event);
    }

    /**
     * Handle user registered events.
     *
     * @param  object  $event
     * @return void
     */
    public function onUserRegistered(\Illuminate\Auth\Events\Registered $event)
    {
        $this->logEvent('registered', $event);
    }

    protected function logEvent($type, $event)
    {
        activity('auth')->on($event->user)->log(":subject.name.en {$type}");
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen('Illuminate\Auth\Events\Failed', 'App\Listeners\UserEventSubscriber@onUserAuthFailed');
        $events->listen('Illuminate\Auth\Events\Lockout', 'App\Listeners\UserEventSubscriber@onUserLockout');
        $events->listen('Illuminate\Auth\Events\Login', 'App\Listeners\UserEventSubscriber@onUserLogin');
        $events->listen('Illuminate\Auth\Events\Logout', 'App\Listeners\UserEventSubscriber@onUserLogout');
        $events->listen('Illuminate\Auth\Events\PasswordReset', 'App\Listeners\UserEventSubscriber@onPasswordReset');
        $events->listen('Illuminate\Auth\Events\Registered', 'App\Listeners\UserEventSubscriber@onUserRegistered');
    }
}
