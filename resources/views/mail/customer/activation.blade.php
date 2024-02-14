<x-mail::message>
### Activate Your Account - Welcome to Book Library App

Hello {{ $name }},

Welcome to Book Library App! We are thrilled to have you on board and are excited that you've chosen to join our
community.

To get started, please activate your account by following the simple steps below:

1. ### Click on the Verify Account Button
<x-mail::button :url="url('/')">
    Verify Account
</x-mail::button>

2. ### Verify Your Email:

During the activation process, you will be prompted to verify your email address. Please ensure that you use the
same email address you used during the registration process.

3. ### Create Your Password:

After email verification, you will need to create a secure password for your account. Make sure to choose a password
that is strong and unique.

Once you've completed these steps, you'll have full access to your Book Library App account, where you can borrow
books that you like to read.

If you encounter any issues during the activation process or have any questions, feel free to reach out to our
support team at [support@booklibrary.com](mailto:support@booklibrary.com). We're here to help!

Regards,<br>
{{ config('app.name') }}

<x-mail::subcopy>
    Thank you for choosing Book Library App. We look forward to providing you with a seamless and enjoyable
    experience.
</x-mail::subcopy>

</x-mail::message>
