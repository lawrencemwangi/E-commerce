<x-admin-layout>
    <div class="reply-wrapper">
        <div class="page-title">Reply to {{ $clientName }}</div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="reply-container">
            <!-- Form -->
            <div class="form-section">
                <form action="{{ route('contact.sendReply',  $message->id) }}" method="POST">
                    @csrf

                    <label>To:</label>
                    <input type="text" value="{{ $clientEmail }}" readonly>

                    <label>Message:</label>
                    <input type="text" value="{{$message->message }}" readonly>

                    <label>Your Reply:</label>
                    <textarea name="reply_message" rows="8" required>{{ $inquiryReply }}</textarea>

                    <button type="submit">Send Reply</button>
                </form>
            </div>

            <!-- Preview -->
            <div class="preview-section">
                <div class="email-preview">
                    <p>Dear {{ $clientName }},</p>
                    <p>{{ $inquiryReply ?: 'Your reply will appear here...' }}</p>
                    <p>We look forward to assisting you further. If you have any questions, feel free to reply to this email.</p>

                    <div class="email-footer">
                        <strong>{{ config('app.name') }}</strong><br>
                        Address: {{ config('site_settings.address') }}<br>
                        Phone: {{ config('site_settings.contact') }}<br>
                        Email: {{ config('site_settings.email') }}<br>
                        Website: <a href="{{ config('site_settings.site_url') }}">{{ config('site_settings.site_url') }}</a><br>
                        &copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>