<x-layout>
    <x-form 
        title="Log in" 
        description="Log in to your account to start sharing your ideas with the world."
        action="/login"
        method="POST">
        
            <x-form.field name="email" label="Email" type="email"/>
            <x-form.field name="password" label="Password" type="password"/>
        
        
            <button type="submit" class="btn w-full" data-test="login-button">Log in</button>
    </x-form>
</x-layout>