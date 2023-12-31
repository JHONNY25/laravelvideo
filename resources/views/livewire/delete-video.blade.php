<div>
    <button wire:click="delete" type="button" class="text-red-700 border border-red-700 bg-white hover:bg-red-700 hover:text-white  focus:ring-4 focus:outline-none focus:ring-red-700 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800 dark:hover:bg-red-500">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
        </svg>
    </button>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('successDelete', (id) => {

                Swal.fire({
                    position: "top-center",
                    icon: "success",
                    title: "Video Deleted",
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        })
</script>
</div>
