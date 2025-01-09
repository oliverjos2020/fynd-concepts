<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use App\Models\DeviceToken;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\SendPushNotification;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;


class PushNotification extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title;
    public $body;
    public $editingID;
    public $limit = '10';

    protected $queryString = ['limit'];
    public bool $processing = false;

    public function edit($id)
    {
        $this->editingID = $id;
        $this->editingTitle = SendPushNotification::find($id)->title;
        $this->editingBody = SendPushNotification::find($id)->body;
    }

public function send()
{
    $this->validate([
        'title' => ['required'],
        'body' => ['required'],
    ]);

    $this->processing = true;  // Start processing

    try {
        // Save the notification to the database
        SendPushNotification::create(['title' => $this->title, 'body' => $this->body]);

        // Simulate a delay (you can remove this in production)
        sleep(2);

        // Fetch all device tokens
        $deviceTokens = DeviceToken::pluck('device_token')->toArray();

        if (empty($deviceTokens)) {
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => 'No device tokens found.',
            ]);
            return;
        }

        // Firebase Admin SDK
        $factory = (new Factory)->withServiceAccount(storage_path('app/firebase/fynd-concept-firebase-adminsdk-ha7h4-d531f4f33a.json'));
        $messaging = $factory->createMessaging();

        foreach ($deviceTokens as $token) {
            // Create and send a message for each token
            $message = CloudMessage::withTarget('token', $token)
                ->withNotification([
                    'title' => $this->title,
                    'body' => $this->body,
                ]);

            $messaging->send($message);
        }

        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Push Notification Sent Successfully.',
        ]);

    } catch (Exception $e) {
        \Log::error('Push Notification Error: ' . $e->getMessage());

        $this->dispatchBrowserEvent('notify', [
            'type' => 'error',
            'message' => 'Failed to send notification: ' . $e->getMessage(),
        ]);
    } finally {
        $this->processing = false;  // Stop processing after the task is complete
    }
}

    public function render()
    {
        $notifications = SendPushNotification::query()->latest()->paginate($this->limit);
        return view('livewire.push-notification',['notifications' => $notifications])->layout('components.dashboard.dashboard-master');
    }
}
