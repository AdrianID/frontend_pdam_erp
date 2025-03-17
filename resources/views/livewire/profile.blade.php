<div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 mx-auto lg:w-8/12">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
            <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                <div class="flex items-center">
                    <p class="mb-0 font-bold text-slate-700 text-xl">Edit Profile</p>
                </div>
            </div>

            <div class="flex-auto p-6">
                <form wire:submit.prevent="updateProfile">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12">
                            <div class="mb-4">
                                <label for="username" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Username</label>
                                <input type="text" wire:model="username" id="username"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                @error('username')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12">
                            <div class="mb-4">
                                <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
                                <input type="email" wire:model="email" id="email"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12">
                            <div class="mb-4">
                                <label for="current_password" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Current Password</label>
                                <input type="password" wire:model="current_password" id="current_password"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                @error('current_password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12">
                            <div class="mb-4">
                                <label for="new_password" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">New Password</label>
                                <input type="password" wire:model="new_password" id="new_password"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                @error('new_password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full max-w-full px-3 shrink-0">
                            <div class="mb-4">
                                <label for="jabatan" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Jabatan</label>
                                <input type="text" wire:model="jabatan" id="jabatan" disabled
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-gray-50 bg-clip-padding px-3 py-2 font-normal text-gray-500 outline-none transition-all" />
                            </div>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="float-right">
                            <button type="submit"
                                class="inline-block px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer active:opacity-85 hover:shadow-sm hover:scale-102 hover:bg-blue-600 leading-pro text-xs ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 