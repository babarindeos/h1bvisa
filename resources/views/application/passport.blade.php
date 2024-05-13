<x-applicant-layout>
    @include('partials._section_nav')
    <section class="flex flex-row max-full  border-red-900 mb-8">
       
        <div class="flex flex-col w-full md:w-full mx-auto items-center py-4">
            
                
                        <form  action="{{ route('passport.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col mx-auto w-[80%] items-center justify-center">
                            @csrf

                            <div class="flex flex-col w-[80%] md:w-[60%] md:hidden" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                                <h2 class="font-semibold text-xl py-1 text-gray-500" >3 of 6</h2>                                               
                            </div>

                            <div class="flex flex-col w-[80%] md:w-[60%] py-2 md:py-4" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                                <h2 class="font-semibold text-xl py-1" >International Passport Information</h2>
                                Provide your international passport information with a picture of the data page. 
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
                            

                            <!-- Passport No. //-->
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                               
                                
                                <input type="text" name="passport_no" class="border border-1 border-gray-400 bg-gray-50
                                                                         w-full p-4 rounded-md 
                                                                         focus:outline-none
                                                                         focus:border-blue-500 
                                                                         focus:ring
                                                                         focus:ring-blue-100" placeholder="Passport Number"
                                                                         
                                                                         style="font-family:'Lato';font-size:16px;font-weight:500;" 
                                                                         
                                                                         value="{{$passport->passport_no}}"
                                                                         
                                                                         required
                                                                          
                                                                         />  
                                                                                                                                               

                                                                         @error('passport_no')
                                                                            <span class="text-red-700 text-sm">
                                                                                {{$message}}
                                                                            </span>
                                                                         @enderror
                                
                            </div>
                            <!-- end of Passport No. //-->


                            <!-- Date Issued //-->
                            <div class="flex flex-col w-[80%] md:flex-row md:w-[60%] md:space-x-3 ">
                                                    
                                                        <label for="issued_day" class="font-semibold" style="font-family:'Lato';font-weight:600;">Date Issued</label>
                                                    
                            </div>
                            <div class="flex flex-col w-[80%] md:flex-row md:w-[60%] md:space-x-3">

                                    <!-- Day //-->
                                    <div class="flex flex-col border-red-900 w-[100%] md:w-[60%] py-2">
                                        
                                        
                                        <select name="issued_day" class="border border-1 border-gray-400 bg-gray-50
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
                                                                                                            if ($passport->issued_day==$day){
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
                                        
                                        
                                        <select name="issued_month" class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" 
                                        
                                        style="font-family:'Lato';font-size:16px;font-weight:500;"
                                        required>
                                            <option value=''>-- Select Month --</option>
                                            <option @if ($passport->issued_month=='January') selected @endif value='January'>January</option>
                                            <option @if ($passport->issued_month=='February') selected @endif value='Febraury'>Febraury</option>
                                            <option @if ($passport->issued_month=='March') selected @endif value='March'>March</option>
                                            <option @if ($passport->issued_month=='April') selected @endif value='April'>April</option>
                                            <option @if ($passport->issued_month=='May') selected @endif value='May'>May</option>
                                            <option @if ($passport->issued_month=='June') selected @endif value='June'>June</option>
                                            <option @if ($passport->issued_month=='July') selected @endif value='July'>July</option>
                                            <option @if ($passport->issued_month=='August') selected @endif value='August'>August</option>
                                            <option @if ($passport->issued_month=='September') selected @endif value='September'>September</option>
                                            <option @if ($passport->issued_month=='October') selected @endif value='October'>October</option>
                                            <option @if ($passport->issued_month=='November') selected @endif value='November'>November</option>
                                            <option @if ($passport->issued_month=='December') selected @endif value='December'>December</option>
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
                                        
                                        
                                        <select name="issued_year" class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100"                                                                                                
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                                required
                                                                                >
                                                                                @php
                                                                                                        
                                                                                                        for ($year = 2008; $year <=2024 ; $year++)
                                                                                                        {
                                                                                                            $selected = '';
                                                                                                            if ($passport->issued_year==$year){
                                                                                                                $selected = 'selected';
                                                                                                            }

                                                                                                           echo "<option ". $selected." value='".$year."'>".$year."</option>";
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
                            <!-- end of Date Issued//-->


                            <!-- Data Page //-->
                            
                            <div class="flex flex-col w-[80%] md:flex-col md:w-[60%] mt-2" >
                                                    
                                                        <label for="day" class="font-semibold" style="font-family:'Lato';">Upload Data Page</label>
                                                        <div style="font-family:'Lato';" class='text-sm'>Upload a picture of the Data page of your international passport</div>

                                                        <div class='bg-green-100 px-2 py-2 rounded-md mt-1'>
                                                                @if ($passport->data_page!='')
                                                                    <a class="text-sm hover:underline" target='_blank' href="{{asset($passport->data_page)}}">Uploaded Passport Data Page </a>
                                                                @endif
                                                        </div>
                            </div>
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-2">
                                
                                
                                <input type="file" name="data_page" class="border border-1 border-gray-400 bg-gray-50
                                                                         w-full p-4 rounded-md 
                                                                         focus:outline-none
                                                                         focus:border-blue-500 
                                                                         focus:ring
                                                                         focus:ring-blue-100" 
                                  
                                 style="font-family:'Lato';font-size:16px;font-weight:500;"
                                 accept="image/*"

                                 required />
                                    

                                 @error('data_page')
                                    <span class="text-red-700 text-sm">
                                        {{$message}}
                                    </span>
                                 @enderror
                                
                            </div>
                           
                            <!-- end of Data Page //-->

                           
                             
                            <!-- submit button //-->
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] mt-8">
                                <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                               hover:bg-gray-500
                                               rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Save</button>
                            </div>




                            <!-- previous and next navigation //-->
                            <div class="flex flex-row md:flex-row justify-end items-end w-[80%] md:w-[60%] mt-2 space-x-2">
                                
                                <div class="flex">
                                    <a href="{{ route('application.professional')}}" class=" bg-green-400 py-4 px-4 text-white 
                                    hover:bg-green-500
                                    rounded-l-lg text-base" style="font-family:'Lato';font-weight:500;">Previous</a>
                                </div>

                                @if ($isfilled->passport)
                                    <div class="flex">
                                            <a href="{{ route('application.payment')}}" class=" bg-green-400 py-4 px-4 text-white 
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