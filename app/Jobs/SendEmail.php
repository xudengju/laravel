<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * 执行队列的方法 比如发送邮件
     *
     * @return void
     */
    public function handle()
    {

        Mail::raw('队列发送邮件',function ($message){
            $user = $this->user;
            // 发件人（你自己的邮箱和名称）
            $message->from('2452439546@qq.com', 'xusir');
            // 收件人的邮箱地址
            $message->to($user['user_email']);
            // 邮件主题
            $message->subject('队列发送邮件');
        });
    }
}