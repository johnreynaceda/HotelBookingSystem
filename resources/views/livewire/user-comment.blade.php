<div>
    {{ $this->form }}
    <div class="mt-5">
        <x-button label="Submit" dark right-icon="save" spinner="submit"
            x-on:confirm="{

            title: 'Sure to submit your comment?',

            icon: 'warning',

            method: 'submit',

        }" />
    </div>
</div>
