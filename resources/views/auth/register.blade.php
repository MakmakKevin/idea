<x-layout>
    <x-form 
        title="Create an account" 
        description="Join Idea and start sharing your ideas with the world."
        action="/register"
        method="POST">
        
            <x-form.field name="name" label="Name" type="text"/>
            <x-form.field name="email" label="Email" type="email"/>
            <x-form.field name="password" label="Password" type="password"/>
        
        
            <button type="submit" class="btn w-full" >Create account</button>
    </x-form>
</x-layout>