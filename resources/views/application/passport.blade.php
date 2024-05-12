<x-applicant-layout>
    @include('partials._section_nav')
    <section class="flex flex-row max-full  border-red-900 mb-8">
       
        <div class="flex flex-col w-full md:w-full mx-auto items-center py-4">
            
                
                        <form  action="{{ route('pre-registration.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col mx-auto w-[80%] items-center justify-center">
                            @csrf

                            <div class="flex flex-col w-[80%] md:w-[60%] py-4 mt-4" style="font-family:'Lato'; font-size:18px; font-weight:350;">
                                <h2 class="font-semibold text-xl py-1" >International Passport Information</h2>
                                Provide your international passport information with a picture of the data page. 
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
                            

                            <!-- Passport No. //-->
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-3">
                               
                                
                                <input type="text" name="passport_no" class="border border-1 border-gray-400 bg-gray-50
                                                                         w-full p-4 rounded-md 
                                                                         focus:outline-none
                                                                         focus:border-blue-500 
                                                                         focus:ring
                                                                         focus:ring-blue-100" placeholder="Passport Number"
                                                                         
                                                                         style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                          
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
                                                    
                                                        <label for="day" class="font-semibold" style="font-family:'Lato';font-weight:600;">Date Issued</label>
                                                    
                            </div>
                            <div class="flex flex-col w-[80%] md:flex-row md:w-[60%] md:space-x-3">

                                    <!-- Day //-->
                                    <div class="flex flex-col border-red-900 w-[100%] md:w-[60%] py-2">
                                        
                                        
                                        <select name="day" class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100"
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"

                                                                                required
                                                                                
                                                                                >  
                                                                                    <option value=''>-- Select Day --</option>
                                                                                    <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option>
                                                                                    <option value='4'>4</option><option value='5'>5</option><option value='6'>6</option>
                                                                                    <option value='7'>7</option><option value='8'>8</option><option value='9'>9</option>
                                                                                    <option value='10'>10</option><option value='11'>11</option><option value='12'>12</option>
                                                                                    <option value='13'>13</option><option value='14'>14</option><option value='15'>15</option>
                                                                                    <option value='16'>16</option><option value='17'>17</option><option value='18'>18</option>
                                                                                    <option value='19'>19</option><option value='20'>20</option><option value='21'>21</option>
                                                                                    <option value='22'>22</option><option value='23'>23</option><option value='24'>24</option>
                                                                                    <option value='25'>25</option><option value='26'>26</option><option value='27'>27</option>
                                                                                    <option value='28'>28</option><option value='29'>29</option><option value='30'>30</option>
                                                                                    <option value='31'>31</option>
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
                                        
                                        
                                        <select name="month" class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" 
                                        
                                        style="font-family:'Lato';font-size:16px;font-weight:500;"
                                        required>
                                            <option value=''>-- Select Month --</option>
                                            <option value='January'>January</option>
                                            <option value='Febraury'>Febraury</option>
                                            <option value='March'>March</option>
                                            <option value='April'>April</option>
                                            <option value='May'>May</option>
                                            <option value='June'>June</option>
                                            <option value='July'>July</option>
                                            <option value='August'>August</option>
                                            <option value='September'>September</option>
                                            <option value='October'>October</option>
                                            <option value='November'>November</option>
                                            <option value='December'>December</option>
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
                                        
                                        
                                        <select name="Year" class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100"                                                                                                
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                                required
                                                                                >
                                                                                <option value=''>-- Select Year --</option>                                                                               
                                                                                <option value='2008'>2008</option><option value='2009'>2009</option><option value='2010'>2010</option>
                                                                                <option value='2011'>2011</option><option value='2012'>2012</option><option value='2013'>2013</option>
                                                                                <option value='2014'>2014</option><option value='2015'>2015</option><option value='2016'>2016</option>
                                                                                <option value='2017'>2017</option><option value='2018'>2018</option><option value='2019'>2019</option>
                                                                                <option value='2020'>2020</option><option value='2021'>2021</option><option value='2022'>2022</option>
                                                                                <option value='2023'>2023</option><option value='2024'>2024</option>

                                                                                required

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
                                                    
                            </div>
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-2">
                                
                                
                                <input type="file" name="data_page" class="border border-1 border-gray-400 bg-gray-50
                                                                         w-full p-4 rounded-md 
                                                                         focus:outline-none
                                                                         focus:border-blue-500 
                                                                         focus:ring
                                                                         focus:ring-blue-100" 
                                  
                                 style="font-family:'Lato';font-size:16px;font-weight:500;"

                                 required />
                                    

                                 @error('educational_level')
                                    <span class="text-red-700 text-sm">
                                        {{$message}}
                                    </span>
                                 @enderror
                                
                            </div>
                           
                            <!-- end of Data Page //-->

                           
                             
                            <!-- submit button //-->
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-8">
                                <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                               hover:bg-gray-500
                                               rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Save</button>
                            </div>

                            

                        </form>
                       
                                

                        
                

        </div>

    </section>

</x-applicant-layout>