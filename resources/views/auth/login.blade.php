<x-guest-layout>
    <section class="flex flex-row max-full  border-red-900">
            <div class="hidden flex-col md:block w-1/4 min-h-svh " 
            style="background-image:url('{{asset('images/register.png')}}'); 
                background-size: cover; 
                background-repeat: repeat
                background-position: right; background-color:#f1f1f1;"
            ></div>
            <div class="flex flex-col w-full md:w-3/4 mx-auto items-center py-12">
                
                    
                            <form  action="{{ route('login') }}" method="POST" class="flex flex-col mx-auto w-[80%] items-center justify-center">
                                @csrf

                                <div class="flex flex-col w-[80%] md:w-[60%] py-4 mt-4" style="font-family:'Lato'; font-size:18px; font-weight:350;">
                                    <h2 class="font-semibold text-xl py-1" >Sign In</h2>
                                    Sign in to complete your application or access your account. 
                                    
                                </div>

                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- EMail //-->
                                <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                                    <!--<label for="surname" class="font-semibold text-gray-700">Surname</label> //-->
                                    
                                    <input type="text" name="email" class="border border-1 border-gray-400 bg-gray-50
                                                                            w-full p-4 rounded-md 
                                                                            focus:outline-none
                                                                            focus:border-blue-500 
                                                                            focus:ring
                                                                            focus:ring-blue-100" placeholder="Email"
                                                                            
                                                                            style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                            
                                                                            
                                                                            />                                                                         

                                                                            @error('email')
                                                                                <span class="text-red-700 text-sm">
                                                                                    {{$message}}
                                                                                </span>
                                                                            @enderror
                                    
                                </div>
                                <!-- end of Email //-->


                                 <!-- Password //-->
                                 <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                                    <!--<label for="password" class="font-semibold text-gray-700">Password</label> //-->
                                    
                                    <input type="password" name="password" class="border border-1 border-gray-400 bg-gray-50
                                                                            w-full p-4 rounded-md 
                                                                            focus:outline-none
                                                                            focus:border-blue-500 
                                                                            focus:ring
                                                                            focus:ring-blue-100" placeholder="Password"
                                                                            
                                                                            style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                            
                                                                            
                                                                            />                                                                         

                                                                            @error('password')
                                                                                <span class="text-red-700 text-sm">
                                                                                    {{$message}}
                                                                                </span>
                                                                            @enderror
                                    
                                </div>
                                <!-- end of Password //-->

                                <!-- submit button //-->
                                <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-2">
                                    <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                                hover:bg-gray-500
                                                rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Sign In</button>
                                </div>


        
                            </form>
            </div>
        </section>
</x-guest-layout>
