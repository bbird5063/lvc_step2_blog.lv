<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/* ДОБАВИЛИ: */
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class StoreUserJob implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	private $data; // ДОБАВИЛИ

	/**
	 * Create a new job instance.
	 */
	public function __construct($data) // ДОБАВЛЯЕМ $data
	{
		$this->data = $data; //  ДОБАВЛЯЕМ 
	}

	/**
	 * Execute the job.
	 */
	public function handle(): void // все, что мы здесь укажем сохранится в табл. jobs
	{
		$password = Str::random(10);
		$this->data['password'] = Hash::make($password);
		$user = User::firstOrCreate(['email' => $this->data['email']], $this->data);

		Mail::to($this->data['email'])->send(new PasswordMail($password));
		event(new Registered($user));
	}
}
