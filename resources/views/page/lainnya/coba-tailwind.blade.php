<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite('resources/css/app.css')
    @fluxAppearance
</head>

<body>


    <div class="bg-red-700 md:w-96 p-4">
        <h1 class="text-green-500 bg-blue-200 border-gray-50">HALO</h1>
    </div>


    <flux:modal.trigger name="edit-profile">
        <flux:button>Edit profile</flux:button>
    </flux:modal.trigger>

    <flux:modal name="edit-profile" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Update profile</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>

            <flux:input label="Name" placeholder="Your name" />

            <flux:input label="Date of birth" type="date" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
        </div>
    </flux:modal>

    <flux:button x-data x-on:click="$flux.dark = ! $flux.dark" icon="moon" variant="subtle"
        aria-label="Toggle dark mode" />

    @fluxScripts

</body>

</html>
