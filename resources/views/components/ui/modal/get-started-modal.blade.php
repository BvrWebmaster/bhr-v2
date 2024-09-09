<div id="modal-register" class="hidden">
    <div class="overflow-y-auto overflow-x-hidden fixed top-0 z-50 flex justify-center items-center w-full tablet:inset-0 bg-black/50 backdrop-blur h-[100vh]">
        <div class="relative p-4 w-full max-w-md max-h-full transform duration-200 space-y-4">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Register Form
                    </h3>
                    <button id="close-register" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="authentication-modal">
                        <x-ui.icon.close-icon-black />
                    </button>
                </div>
                <x-forms.register-form />
            </div>
        </div>
    </div>
</div>
