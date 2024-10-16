<div class="p-4 md:p-5">
    <form class="space-y-4">
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
            <input type="text" name="first_name" id="first_name"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="First Name" required/>
        </div>
        <div>
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
            <input type="text" name="last_name" id="last_name"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="Last Name"/>
        </div>
        <div>
            <label for="email-register"
                   class="block mb-2 text-sm font-medium text-gray-900">email</label>
            <input type="email" name="email" id="email-register"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="name@company.com" required/>
        </div>
        <div>
            <label for="password"
                   class="block mb-2 text-sm font-medium text-gray-900">password</label>
            <input type="password" name="password" id="password"  placeholder="••••••••"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   required/>
        </div>
        <div>
            <label for="phone_number"
                   class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" placeholder="+628xxxxxxx"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   required/>
        </div>
        <button type="submit" class="w-full text-white bg-[#FF5700] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Register
        </button>
    </form>
</div>
