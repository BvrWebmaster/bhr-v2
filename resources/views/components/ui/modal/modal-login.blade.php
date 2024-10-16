<div class="hidden modal-login">
    <div class="overflow-y-auto overflow-x-hidden fixed top-0 z-50 flex justify-center items-center w-full tablet:inset-0 bg-black/50 backdrop-blur h-[100vh]">
        <div class="relative p-4 w-full max-w-md max-h-full transform duration-200 space-y-4">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Login Form
                    </h3>
                    <button class="close-login end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="authentication-modal">
                        <x-ui.icon.close-icon-black />
                    </button>
                </div>
                <x-forms.login-form />
            </div>
        </div>
    </div>
</div>
