<x-guest-layout>
    <section class="flex flex-row max-full  border-red-900">
        <div class="hidden md:block w-1/4 " 
        style="background-image:url('{{asset('images/register.png')}}'); 
               background-size: cover; 
               background-repeat: repeat
               background-position: right; background-color:#f1f1f1;"
        ></div>
        <div class="flex flex-col w-full md:w-3/4 mx-auto items-center py-8">
            
                
                        <form  action="{{ route('pre-registration.store') }}" method="POST" class="flex flex-col mx-auto w-[80%] items-center justify-center">
                            @csrf

                            <div class="flex flex-col w-[80%] md:w-[60%] py-4 mt-4" style="font-family:'Lato'; font-size:18px; font-weight:350;">
                                <h2 class="font-semibold text-xl py-1" >Pre-Registration</h2>
                                Start the registration process by providing your personal details. 
                                This enables us to send important information before you proceed with the application process.
                            </div>

                            @if (session('error'))

                                @if (session('status')=='success')
                                    <span class="flex flex-col w-[80%] md:w-[60%] py-4 px-2 my-2 bg-green-50 rounded text-green-800 font-semibold" 
                                            style="font-family:'Lato'; font-size:16px;"> 
                                        {{ session('message') }}
                                    </span>
                                @else
                                    <span class="flex flex-col w-[80%] md:w-[60%] py-4 px-2 my-2 bg-red-50 rounded text-red-800 font-semibold" 
                                            style="font-family:'Lato'; font-size:16px;">
                                        {{ session('message') }}
                                    </span>
                                @endif

                            @endif
                            

                            <!-- Surname //-->
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                                <!--<label for="surname" class="font-semibold text-gray-700">Surname</label> //-->
                                
                                <input type="text" name="surname" class="border border-1 border-gray-400 bg-gray-50
                                                                         w-full p-4 rounded-md 
                                                                         focus:outline-none
                                                                         focus:border-blue-500 
                                                                         focus:ring
                                                                         focus:ring-blue-100" placeholder="Surname"
                                                                         
                                                                         style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                         
                                                                          
                                                                         />                                                                         

                                                                         @error('surname')
                                                                            <span class="text-red-700 text-sm">
                                                                                {{$message}}
                                                                            </span>
                                                                         @enderror
                                
                            </div>
                            <!-- end of Surname //-->

                            <!-- Firstname //-->
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-2">
                                <!-- <label for="firstname">Firstname</label> //-->
                                
                                <input type="text" name="firstname" class="border border-1 border-gray-400 bg-gray-50
                                                                         w-full p-4 rounded-md 
                                                                         focus:outline-none
                                                                         focus:border-blue-500 
                                                                         focus:ring
                                                                         focus:ring-blue-100" 
                                 placeholder="Firstname" 
                                 style="font-family:'Lato';font-size:16px;font-weight:500;"
                                 />

                                 @error('firstname')
                                    <span class="text-red-700 text-sm">
                                        {{$message}}
                                    </span>
                                 @enderror
                                
                            </div>
                           
                            <!-- end of Firstname //-->

                            <!-- Middlename //-->
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-2">
                                <!-- <label for="middlename">Middlename</label> //-->
                                
                                <input type="text" name="middlename" class="border border-1 border-gray-400 bg-gray-50
                                                                         w-full p-4 rounded-md 
                                                                         focus:outline-none
                                                                         focus:border-blue-500 
                                                                         focus:ring
                                                                         focus:ring-blue-100"
                                                                         
                                                                         placeholder = "Middlename"
                                                                         style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                         />

                                                                         @error('middlename')
                                                                            <span class="text-red-700 text-sm">
                                                                                {{$message}}
                                                                            </span>
                                                                         @enderror
                                
                            </div>
                            
                            <!-- end of Middlename //-->

                             <!-- Email //-->
                             <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-2">
                                <!-- <label for="email">Email</label> //-->
                                
                                <input type="email" name="email" class="border border-1 border-gray-400 bg-gray-50
                                                                         w-full p-4 rounded-md 
                                                                         focus:outline-none
                                                                         focus:border-blue-500 
                                                                         focus:ring
                                                                         focus:ring-blue-100" 
                                                                        
                                                                        placeholder = "Email"
                                                                        style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                        />

                                                                        @error('email')
                                                                            <span class="text-red-700 text-sm">
                                                                                {{$message}}
                                                                            </span>
                                                                        @enderror
                                
                            </div>
                           
                            <!-- end of Email //-->

                            <!-- Phone //-->
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-2">
                                <!-- <label for="email">Phone</label> //-->
                                
                                <input type="phone" name="phone" class="border border-1 border-gray-400 bg-gray-50
                                                                         w-full p-4 rounded-md 
                                                                         focus:outline-none
                                                                         focus:border-blue-500 
                                                                         focus:ring
                                                                         focus:ring-blue-100"
                                                                         maxlength = "11"
                                                                         placeholder = "Phone"
                                                                         style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                         />

                                                                         @error('phone')
                                                                            <span class="text-red-700 text-sm">
                                                                                {{$message}}
                                                                            </span>
                                                                         @enderror
                                
                            </div>
                            <!-- end of Phone //-->
                           

                            <!-- submit button //-->
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-2">
                                <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                               hover:bg-gray-500
                                               rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Submit</button>
                            </div>

                            

                        </form>
                       
                                

                        
                

        </div>

    </section>


</x-guest-layout>