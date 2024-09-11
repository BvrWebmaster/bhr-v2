<div class="p-4 md:px-5 md:pt-2 md:pb-5">
    <form method="post" class="space-y-4">
        @csrf
        @method("post")
        <div>
            <label for="email-guest" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email-guest" name="email" placeholder="name@gmail.com" required
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
        </div>

        <div>
            <label for="password-guest" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" id="password-guest" name="password" placeholder="••••••••" required
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
        </div>

        <button class="w-full text-white bg-[#FF5700] font-medium rounded-lg px-5 py-2.5 text-center transform duration-300 active:scale-95">
            Log In
        </button>
    </form>

</div>
