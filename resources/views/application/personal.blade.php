<x-applicant-layout>
    @include('partials._section_nav')

    <section class="mb-8">
                <div class="flex flex-col w-full md:w-full mx-auto items-center py-4 ">
                            
                                
                                        <form  action="{{ route('personal.store') }}" method="POST" class="flex flex-col mx-auto w-[80%] items-center justify-center">
                                            @csrf

                                            <div class="flex flex-col w-[80%] md:w-[60%] py-4 mt-4" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                                                <h2 class="font-semibold text-xl py-1" >Personal Information</h2>
                                                Start the registration process by providing your personal details. 
                                                
                                            </div>

                                            @if (session('error'))

                                                @if (session('status')=='success')
                                                    <span class="flex flex-col w-[80%] md:w-[60%] py-4 px-2 my-2 bg-green-50 rounded text-green-800 font-medium" 
                                                            style="font-family:'Lato'; font-size:16px;"> 
                                                        {{ session('message') }}
                                                    </span>
                                                @else
                                                    <span class="flex flex-col w-[80%] md:w-[60%] py-4 px-2 my-2 bg-red-50 rounded text-red-800 font-medium" 
                                                            style="font-family:'Lato'; font-size:16px;">
                                                        {{ session('message') }}
                                                    </span>
                                                @endif

                                            @endif
                                            
                                            <div  class="flex  w-[80%] md:w-[60%]">
                                                <div id='readonlyToggleButton' class='flex bg-gray-100 text-xs px-4 py-1 hover:bg-gray-200 hover:font-semibold border border-1 border-gray-200 cursor-pointer' >
                                                    Readonly Fields
                                                </div>
                                            </div>


                                            <!-----------------------  ReadOnly Fields //--------------------------------->
                                            <div id='readonlyfields' class="flex-col w-[80%]  md:w-[60%] mx-auto hidden" >
                                                    <!-- Names //-->
                                                    <div class="flex flex-col w-[100%] md:w-[100%]  md:flex-row  md:space-x-3">

                                                            <!-- Surname //-->
                                                            <div class="flex flex-col border-red-900 w-[100%] md:w-[60%] py-2">
                                                                <!--<label for="surname" class="font-semibold text-gray-700">Surname</label> //-->
                                                                
                                                                <input type="text" name="surname" class="border border-1 border-gray-400 bg-gray-50
                                                                                                        w-full p-4 rounded-md 
                                                                                                        focus:outline-none
                                                                                                        focus:border-blue-500 
                                                                                                        focus:ring
                                                                                                        focus:ring-blue-100" placeholder="Surname"
                                                                                                        
                                                                                                        style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                                                        
                                                                                                        value = "{{ $user->surname }}"

                                                                                                        readonly
                                                                                                        
                                                                                                        />                                                                         

                                                                                                        @error('surname')
                                                                                                            <span class="text-red-700 text-sm">
                                                                                                                {{$message}}
                                                                                                            </span>
                                                                                                        @enderror
                                                                <span class='font-semibold'>
                                                                    <small>Surname</small>
                                                                </span>
                                                            </div>
                                                            <!-- end of Surname //-->

                                                            <!-- Firstname //-->
                                                            <div class="flex flex-col border-red-900 w-[100%] md:w-[60%] py-2">
                                                                <!-- <label for="firstname">Firstname</label> //-->
                                                                
                                                                <input type="text" name="firstname" class="border border-1 border-gray-400 bg-gray-50
                                                                                                        w-full p-4 rounded-md 
                                                                                                        focus:outline-none
                                                                                                        focus:border-blue-500 
                                                                                                        focus:ring
                                                                                                        focus:ring-blue-100" 
                                                                placeholder="Firstname" 
                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"

                                                                value = "{{ $user->firstname}}"

                                                                readonly
                                                                />

                                                                @error('firstname')
                                                                    <span class="text-red-700 text-sm">
                                                                        {{$message}}
                                                                    </span>
                                                                @enderror

                                                                <span class='font-semibold'>
                                                                    <small>Firstname</small>
                                                                </span>
                                                                
                                                            </div>
                                                        
                                                            <!-- end of Firstname //-->

                                                            <!-- Middlename //-->
                                                            <div class="flex flex-col border-red-900 w-[100%] md:w-[60%] py-2">
                                                                <!-- <label for="middlename">Middlename</label> //-->
                                                                
                                                                <input type="text" name="middlename" class="border border-1 border-gray-400 bg-gray-50
                                                                                                        w-full p-4 rounded-md 
                                                                                                        focus:outline-none
                                                                                                        focus:border-blue-500 
                                                                                                        focus:ring
                                                                                                        focus:ring-blue-100"
                                                                                                        
                                                                                                        placeholder = "Middlename"
                                                                                                        style="font-family:'Lato';font-size:16px;font-weight:500;"

                                                                                                        value = "{{ $user->middlename }}"

                                                                                                        readonly
                                                                                                        />

                                                                                                        @error('middlename')
                                                                                                            <span class="text-red-700 text-sm">
                                                                                                                {{$message}}
                                                                                                            </span>
                                                                                                        @enderror

                                                                        <span class='font-semibold'>
                                                                            <small>Middlename</small>
                                                                        </span>
                                                                
                                                            </div>
                                                            
                                                            <!-- end of Middlename //-->
                                                    </div>
                                                    <!-- end of Names //-->




                                                    <!-- email and phone //-->
                                                    <div class="flex flex-col  md:flex-row md:w-[100%] md:space-x-3">
                                                                        <!-- Email //-->
                                                                        <div class="flex flex-col border-red-900 w-[100%] md:w-[74%] py-2">
                                                                            <!-- <label for="email">Email</label> //-->
                                                                            
                                                                            <input type="email" name="email" class="border border-1 border-gray-400 bg-gray-50
                                                                                                                    w-full p-4 rounded-md 
                                                                                                                    focus:outline-none
                                                                                                                    focus:border-blue-500 
                                                                                                                    focus:ring
                                                                                                                    focus:ring-blue-100" 
                                                                                                                    
                                                                                                                    placeholder = "Email"
                                                                                                                    style="font-family:'Lato';font-size:16px;font-weight:500;"

                                                                                                                    value = "{{ $user->email }}"

                                                                                                                    readonly
                                                                                                                    />

                                                                                                                    @error('email')
                                                                                                                        <span class="text-red-700 text-sm">
                                                                                                                            {{$message}}
                                                                                                                        </span>
                                                                                                                    @enderror

                                                                                                                    <span class='font-semibold'>
                                                                                                                        <small>Email</small>
                                                                                                                    </span>
                                                                            
                                                                        </div>
                                                                    
                                                                        <!-- end of Email //-->

                                                                        <!-- Phone //-->
                                                                        <div class="flex flex-col border-red-900 w-[100%] md:w-[36%] py-2">
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

                                                                                                                    value = "{{ $user->phone }}"

                                                                                                                    readonly
                                                                                                                    />

                                                                                                                    @error('phone')
                                                                                                                        <span class="text-red-700 text-sm">
                                                                                                                            {{$message}}
                                                                                                                        </span>
                                                                                                                    @enderror

                                                                                                                    <span class='font-semibold'>
                                                                                                                        <small>Phone</small>
                                                                                                                    </span>
                                                                            
                                                                        </div>
                                                                        <!-- end of Phone //-->
                                                

                                                    </div>
                                                    <!-- end of email and phone //-->

                                        </div><!-----------------------  End ReadOnly Fields //--------------------------------->


                                        <!-- ------------------ Gender and Marital Status ....................................//-->

                                        <!-- Gender and Marital Status //-->
                                        <div class="flex flex-col w-[80%] md:flex-row md:w-[60%] md:space-x-3">
                                                                        <!-- Gender //-->
                                                                        <div class="flex flex-col border-red-900 w-[100%] md:w-[60%] py-2">
                                                                                            
                                                                                        
                                                                                        <select name="gender" class="border border-1 border-gray-400 bg-gray-50
                                                                                                                                w-full p-4 rounded-md 
                                                                                                                                focus:outline-none
                                                                                                                                focus:border-blue-500 
                                                                                                                                focus:ring
                                                                                                                                focus:ring-blue-100"
                                                                                                                                required                                                                                                                     
                                                                                                                                >
                                                                                                <option value=''>-- Select Gender --</option>
                                                                                                <option @if ($personal->gender == 'male') selected @endif value='male'>Male</option>
                                                                                                <option @if ($personal->gender == 'female') selected @endif value='female'>Female</option>


                                                                                        </select>

                                                                                                                                @error('gender')
                                                                                                                                    <span class="text-red-700 text-sm">
                                                                                                                                        {{$message}}
                                                                                                                                    </span>
                                                                                                                                @enderror

                                                                                                                               
                                                                                        
                                                                        </div>
                                                                        <!-- end of Gender //-->
                                                
                                                                        
                                                                            
                                                                        

                                                                        <!-- Marital Status //-->
                                                                        <div class="flex flex-col border-red-900 w-[100%] md:w-[60%] py-2">
                                                                            
                                                                                        <select name="marital_status" class="border border-1 border-gray-400 bg-gray-50
                                                                                                                                w-full p-4 rounded-md 
                                                                                                                                focus:outline-none
                                                                                                                                focus:border-blue-500 
                                                                                                                                focus:ring
                                                                                                                                focus:ring-blue-100"  
                                                                                                                                required                                                                                                                   
                                                                                                                                >
                                                                                                <option value=''>-- Select Marital Status --</option>
                                                                                                <option @if ($personal->marital_status == 'Single') selected @endif  value='Single'>Single</option>
                                                                                                <option @if ($personal->marital_status == 'Married') selected @endif value='Married'>Married</option>
                                                                                                <option @if ($personal->marital_status == 'Widowed') selected @endif value='Widowed'>Widowed</option>
                                                                                                <option @if ($personal->marital_status == 'Divorced') selected @endif  value='Divorced'>Divorced</option>
                                                                                                <option @if ($personal->marital_status == 'Separated') selected @endif value='Separated'>Separated</option>

                                                                                        </select>
                                                                            
                                                                            
                                                                                        @error('marital_status')
                                                                                            <span class="text-red-700 text-sm">
                                                                                                {{$message}}
                                                                                            </span>
                                                                                        @enderror                                                                                                                    
                                                                            
                                                                        </div>
                                                                        <!-- end of Marital Status //-->
                                                

                                                    </div>
                                                    <!-- end of Gender and Marital Status //-->

                                        


                                        <!-- .................... end of Gender and Marital Status ---------------------------//-->


                                        <!-- ------------------ Nationality and States ....................................//-->

                                        <!-- Nationality and States //-->
                                        <div class="flex flex-col w-[80%] md:flex-row md:w-[60%] md:space-x-3">
                                                                        <!-- Nationality //-->
                                                                        <div class="flex flex-col border-red-900 w-[100%] md:w-[60%] py-2">
                                                                                            
                                                                                        
                                                                                        <select name="nationality" class="border border-1 border-gray-400 bg-gray-50
                                                                                                                                w-full p-4 rounded-md 
                                                                                                                                focus:outline-none
                                                                                                                                focus:border-blue-500 
                                                                                                                                focus:ring
                                                                                                                                focus:ring-blue-100"  
                                                                                                                                required                                                                                                                   
                                                                                                                                >
                                                                                                <option value=''>-- Select Nationality --</option>
                                                                                                <option @if ($personal->nationality == 'Nigerian') selected @endif value='Nigerian'>Nigerian</option>
                                                                                                <option @if ($personal->month == 'Non-Nigerian') selected @endif value='Non-Nigerian'>Non-Nigerian</option>


                                                                                        </select>

                                                                                                                                @error('nationality')
                                                                                                                                    <span class="text-red-700 text-sm">
                                                                                                                                        {{$message}}
                                                                                                                                    </span>
                                                                                                                                @enderror

                                                                                                                               
                                                                                        
                                                                        </div>
                                                                        <!-- end of Nationality //-->
                                                
                                                                        
                                                                            
                                                                        

                                                                        <!-- State //-->
                                                                        <div class="flex flex-col border-red-900 w-[100%] md:w-[60%] py-2">
                                                                            
                                                                                        <select name="state" class="border border-1 border-gray-400 bg-gray-50
                                                                                                                                w-full p-4 rounded-md 
                                                                                                                                focus:outline-none
                                                                                                                                focus:border-blue-500 
                                                                                                                                focus:ring
                                                                                                                                focus:ring-blue-100"   
                                                                                                                                required                                                                                                                  
                                                                                                                                >
                                                                                                <option value=''>-- Select State --</option>
                                                                                                <option @if ($personal->state == 'Abuja FCT') selected @endif value="Abuja FCT">Abuja FCT</option>
                                                                                                <option @if ($personal->state == 'Abia') selected @endif value="Abia">Abia</option>
                                                                                                <option @if ($personal->state == 'Adamawa') selected @endif value="Adamawa">Adamawa</option>
                                                                                                <option @if ($personal->state == 'Akwa Ibom') selected @endif value="Akwa Ibom">Akwa Ibom</option>
                                                                                                <option @if ($personal->state == 'Anambra') selected @endif value="Anambra">Anambra</option>
                                                                                                <option @if ($personal->state == 'Bauchi') selected @endif value="Bauchi">Bauchi</option>
                                                                                                <option @if ($personal->state == 'Bayelsa') selected @endif value="Bayelsa">Bayelsa</option>
                                                                                                <option @if ($personal->state == 'Benue') selected @endif value="Benue">Benue</option>
                                                                                                <option @if ($personal->state == 'Borno') selected @endif value="Borno">Borno</option>
                                                                                                <option @if ($personal->state == 'Cross River') selected @endif value="Cross River">Cross River</option>
                                                                                                <option @if ($personal->state == 'Delta') selected @endif value="Delta">Delta</option>
                                                                                                <option @if ($personal->state == 'Ebonyi') selected @endif value="Ebonyi">Ebonyi</option>
                                                                                                <option @if ($personal->state == 'Edo') selected @endif value="Edo">Edo</option>
                                                                                                <option @if ($personal->state == 'Ekiti') selected @endif value="Ekiti">Ekiti</option>
                                                                                                <option @if ($personal->state == 'Enugu') selected @endif value="Enugu">Enugu</option>
                                                                                                <option @if ($personal->state == 'Gombe') selected @endif value="Gombe">Gombe</option>
                                                                                                <option @if ($personal->state == 'Imo') selected @endif value="Imo">Imo</option>
                                                                                                <option @if ($personal->state == 'Jigawa') selected @endif value="Jigawa">Jigawa</option>
                                                                                                <option @if ($personal->state == 'Kaduna') selected @endif value="Kaduna">Kaduna</option>
                                                                                                <option @if ($personal->state == 'Kano') selected @endif value="Kano">Kano</option>
                                                                                                <option @if ($personal->state == 'Katsina') selected @endif value="Katsina">Katsina</option>
                                                                                                <option @if ($personal->state == 'Kebbi') selected @endif value="Kebbi">Kebbi</option>
                                                                                                <option @if ($personal->state == 'Kogi') selected @endif value="Kogi">Kogi</option>
                                                                                                <option @if ($personal->state == 'Kwara') selected @endif value="Kwara">Kwara</option>
                                                                                                <option @if ($personal->state == 'Lagos') selected @endif value="Lagos">Lagos</option>
                                                                                                <option @if ($personal->state == 'Nassarawa') selected @endif value="Nassarawa">Nassarawa</option>
                                                                                                <option @if ($personal->state == 'Niger') selected @endif value="Niger">Niger</option>
                                                                                                <option @if ($personal->state == 'Ogun') selected @endif value="Ogun">Ogun</option>
                                                                                                <option @if ($personal->state == 'Ondo') selected @endif value="Ondo">Ondo</option>
                                                                                                <option @if ($personal->state == 'Osun') selected @endif value="Osun">Osun</option>
                                                                                                <option @if ($personal->state == 'Oyo') selected @endif value="Oyo">Oyo</option>
                                                                                                <option @if ($personal->state == 'Plateau') selected @endif value="Plateau">Plateau</option>
                                                                                                <option @if ($personal->state == 'Rivers') selected @endif value="Rivers">Rivers</option>
                                                                                                <option @if ($personal->state == 'Sokoto') selected @endif value="Sokoto">Sokoto</option>
                                                                                                <option @if ($personal->state == 'Taraba') selected @endif value="Taraba">Taraba</option>
                                                                                                <option @if ($personal->state == 'Yobe') selected @endif value="Yobe">Yobe</option>
                                                                                                <option @if ($personal->state == 'Zamfara') selected @endif value="Zamfara">Zamfara</option>

                                                                                        </select>
                                                                            
                                                                            
                                                                                        @error('state')
                                                                                            <span class="text-red-700 text-sm">
                                                                                                {{$message}}
                                                                                            </span>
                                                                                        @enderror                                                                                                                    
                                                                            
                                                                        </div>
                                                                        <!-- end of State //-->
                                                

                                                    </div>
                                                    <!-- end of Nationality and States //-->

                                        


                                        <!-- .................... end of Nationality and States ---------------------------// -->




                                        <!-- Date of Birth //-->
                                        <div class="flex flex-col w-[80%] md:flex-row md:w-[60%] md:space-x-3">
                                                    
                                                        <label for="day" class="font-semibold">Date of Birth</label>
                                                    
                                        </div>
                                        <div class="flex flex-col w-[80%] md:flex-row md:w-[60%] md:space-x-3">
                                                    

                                                    <!-- Day //-->
                                                    <div class="flex flex-col border-red-900 w-[100%] md:w-[60%] py-2">
                                                        
                                                        
                                                        <select name="dob_day" class="border border-1 border-gray-400 bg-gray-50
                                                                                                w-full p-4 rounded-md 
                                                                                                focus:outline-none
                                                                                                focus:border-blue-500 
                                                                                                focus:ring
                                                                                                focus:ring-blue-100"
                                                                                                
                                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                                                required
                                                                                                >  
                                                                                                    <option value=''>-- Select Day --</option>
                                                                                                    @php
                                                                                                        
                                                                                                        for ($day = 1; $day <=31 ; $day++)
                                                                                                        {
                                                                                                            $selected = '';
                                                                                                            if ($personal->dob_day==$day){
                                                                                                                $selected = 'selected';
                                                                                                            }

                                                                                                           echo "<option ". $selected." value='".$day."'>".$day."</option>";
                                                                                                        }
                                                                                                        
                                                                                                    @endphp

                                                                                                    
                                                                                                </select>

                                                                                                @error('day')
                                                                                                    <span class="text-red-700 text-sm">
                                                                                                        {{$message}}
                                                                                                    </span>
                                                                                                @enderror
                                                        
                                                    </div>
                                                    <!-- end of Day //-->

                                                    <!-- Month //-->
                                                    <div class="flex flex-col border-red-900 w-[100%] md:w-[60%] py-2">
                                                        
                                                        
                                                        <select name="dob_month" class="border border-1 border-gray-400 bg-gray-50
                                                                                                w-full p-4 rounded-md 
                                                                                                focus:outline-none
                                                                                                focus:border-blue-500 
                                                                                                focus:ring
                                                                                                focus:ring-blue-100" 
                                                         
                                                        style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                        required
                                                       >
                                                            <option value=''>-- Select Month --</option>
                                                            <option @if ($personal->dob_month == 'January') selected @endif value='January'>January</option>
                                                            <option @if ($personal->dob_month == 'February') selected @endif value='Febraury'>Febraury</option>
                                                            <option @if ($personal->dob_month == 'March') selected @endif value='March'>March</option>
                                                            <option @if ($personal->dob_month == 'April') selected @endif value='April'>April</option>
                                                            <option @if ($personal->dob_month == 'May') selected @endif value='May'>May</option>
                                                            <option @if ($personal->dob_month == 'June') selected @endif value='June'>June</option>
                                                            <option @if ($personal->dob_month == 'July') selected @endif value='July'>July</option>
                                                            <option @if ($personal->dob_month == 'August') selected @endif value='August'>August</option>
                                                            <option @if ($personal->dob_month == 'September') selected @endif value='September'>September</option>
                                                            <option @if ($personal->dob_month == 'October') selected @endif value='October'>October</option>
                                                            <option @if ($personal->dob_month == 'November') selected @endif value='November'>November</option>
                                                            <option @if ($personal->dob_month == 'December') selected @endif value='December'>December</option>
                                                       </select>
                                                        @error('month')
                                                            <span class="text-red-700 text-sm">
                                                                {{$message}}
                                                            </span>
                                                        @enderror

                                                        
                                                        
                                                    </div>

                                                    <!-- end of Month //-->

                                                    <!-- Year //-->
                                                    <div class="flex flex-col border-red-900 w-[100%] md:w-[60%] py-2">
                                                        
                                                        
                                                        <select name="dob_year" class="border border-1 border-gray-400 bg-gray-50
                                                                                                w-full p-4 rounded-md 
                                                                                                focus:outline-none
                                                                                                focus:border-blue-500 
                                                                                                focus:ring
                                                                                                focus:ring-blue-100"                                                                                                
                                                                                                placeholder = "Middlename"
                                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                                                required
                                                                                                >
                                                                                                <option value=''>-- Select Year --</option>
                                                                                                @php
                                                                                                        
                                                                                                        for ($year = 1960; $year <=2015 ; $year++)
                                                                                                        {
                                                                                                            $selected = '';
                                                                                                            if ($personal->dob_year==$year){
                                                                                                                $selected = 'selected';
                                                                                                            }

                                                                                                           echo "<option ". $selected. " value='". $year. "'>".$year."</option>";
                                                                                                        }
                                                                                                        
                                                                                                @endphp



                                                                                            </select>

                                                                                                @error('year')
                                                                                                    <span class="text-red-700 text-sm">
                                                                                                        {{$message}}
                                                                                                    </span>
                                                                                                @enderror

                                                                
                                                        
                                                    </div>

                                                    <!-- end of Year //-->
                                    </div>
                                    <!-- end of Date of Birth //-->



                                            

                                            <!-- submit button //-->
                                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] mt-8">
                                                <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                                            hover:bg-gray-500
                                                            rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Save</button>
                                            </div>


                                            <!-- previous and next navigation //-->
                                            <div class="flex flex-col md:flex-row justify-end items-end w-[80%] md:w-[60%] mt-2">
                                                    @if ($isfilled->personal)
                                                        <div class="flex">
                                                                <a href="{{ route('application.professional')}}" class=" bg-green-400 py-4 px-4 text-white 
                                                                hover:bg-green-500
                                                                rounded-r-lg text-base" style="font-family:'Lato';font-weight:500;">Next</a>
                                                        </div>
                                                    @endif
                                               
                                            </div>
                                            <!-- end of previous and next navigation //-->


                                            

                                        </form>
                                    
                                                

                                        
                                

                </div>

    </section>

    



</x-applicant-layout>

<script type="text/javascript">
    $(document).ready(function(){
        $("#readonlyToggleButton").bind("click", function(){
            $("#readonlyfields").slideToggle();
        });
    });
</script>