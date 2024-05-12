<x-applicant-layout>
    @include('partials._section_nav')

    <section class="mb-8">
                <div class="flex flex-col w-full md:w-full mx-auto items-center py-4 ">
                            
                                
                                        <form  action="{{ route('pre-registration.store') }}" method="POST" class="flex flex-col mx-auto w-[80%] items-center justify-center">
                                            @csrf

                                            <div class="flex flex-col w-[80%] md:w-[60%] py-4 mt-4" style="font-family:'Lato'; font-size:18px; font-weight:350;">
                                                <h2 class="font-semibold text-xl py-1" >Personal Information</h2>
                                                Start the registration process by providing your personal details. 
                                                
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
                                                                                                                                >
                                                                                                <option value=''>-- Select Gender --</option>
                                                                                                <option value='male'>Male</option>
                                                                                                <option value='female'>Female</option>


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
                                                                                                                                >
                                                                                                <option value=''>-- Select Marital Status --</option>
                                                                                                <option value='Single'>Single</option>
                                                                                                <option value='Married'>Married</option>
                                                                                                <option value='Widowed'>Widowed</option>
                                                                                                <option value='Divorced'>Divorced</option>
                                                                                                <option value='Separated'>Separated</option>


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
                                                                                                                                >
                                                                                                <option value=''>-- Select Nationality --</option>
                                                                                                <option value='Nigerian'>Nigerian</option>
                                                                                                <option value='Non-Nigerian'>Non-Nigerian</option>


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
                                                                                                                                >
                                                                                                <option value=''>-- Select State --</option>
                                                                                                <option value="Abuja FCT">Abuja FCT</option>
                                                                                                <option value="Abia">Abia</option>
                                                                                                <option value="Adamawa">Adamawa</option>
                                                                                                <option value="Akwa Ibom">Akwa Ibom</option>
                                                                                                <option value="Anambra">Anambra</option>
                                                                                                <option value="Bauchi">Bauchi</option>
                                                                                                <option value="Bayelsa">Bayelsa</option>
                                                                                                <option value="Benue">Benue</option>
                                                                                                <option value="Borno">Borno</option>
                                                                                                <option value="Cross River">Cross River</option>
                                                                                                <option value="Delta">Delta</option>
                                                                                                <option value="Ebonyi">Ebonyi</option>
                                                                                                <option value="Edo">Edo</option>
                                                                                                <option value="Ekiti">Ekiti</option>
                                                                                                <option value="Enugu">Enugu</option>
                                                                                                <option value="Gombe">Gombe</option>
                                                                                                <option value="Imo">Imo</option>
                                                                                                <option value="Jigawa">Jigawa</option>
                                                                                                <option value="Kaduna">Kaduna</option>
                                                                                                <option value="Kano">Kano</option>
                                                                                                <option value="Katsina">Katsina</option>
                                                                                                <option value="Kebbi">Kebbi</option>
                                                                                                <option value="Kogi">Kogi</option>
                                                                                                <option value="Kwara">Kwara</option>
                                                                                                <option value="Lagos">Lagos</option>
                                                                                                <option value="Nassarawa">Nassarawa</option>
                                                                                                <option value="Niger">Niger</option>
                                                                                                <option value="Ogun">Ogun</option>
                                                                                                <option value="Ondo">Ondo</option>
                                                                                                <option value="Osun">Osun</option>
                                                                                                <option value="Oyo">Oyo</option>
                                                                                                <option value="Plateau">Plateau</option>
                                                                                                <option value="Rivers">Rivers</option>
                                                                                                <option value="Sokoto">Sokoto</option>
                                                                                                <option value="Taraba">Taraba</option>
                                                                                                <option value="Yobe">Yobe</option>
                                                                                                <option value="Zamfara">Zamfara</option>

                                                                                        </select>
                                                                            
                                                                            
                                                                                        @error('states')
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
                                                        
                                                        
                                                        <select name="day" class="border border-1 border-gray-400 bg-gray-50
                                                                                                w-full p-4 rounded-md 
                                                                                                focus:outline-none
                                                                                                focus:border-blue-500 
                                                                                                focus:ring
                                                                                                focus:ring-blue-100"
                                                                                                
                                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                                                
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

                                                       >
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
                                                                                                placeholder = "Middlename"
                                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"
                                                                                                required
                                                                                                >
                                                                                                <option value=''>-- Select Year --</option>
                                                                                                <option value='1960'>1960</option><option value='1961'>1961</option><option value='1962'>1962</option>
                                                                                                <option value='1963'>1963</option><option value='1964'>1964</option><option value='1965'>1965</option>
                                                                                                <option value='1966'>1966</option><option value='1967'>1967</option><option value='1968'>1968</option>
                                                                                                <option value='1969'>1969</option><option value='1970'>1970</option><option value='1971'>1971</option>
                                                                                                <option value='1972'>1972</option><option value='1973'>1973</option><option value='1974'>1974</option>
                                                                                                <option value='1975'>1975</option><option value='1976'>1976</option><option value='1977'>1977</option>
                                                                                                <option value='1978'>1978</option><option value='1979'>1979</option><option value='1980'>1980</option>
                                                                                                <option value='1981'>1981</option><option value='1982'>1982</option><option value='1983'>1983</option>
                                                                                                <option value='1984'>1984</option><option value='1985'>1985</option><option value='1986'>1986</option>
                                                                                                <option value='1987'>1987</option><option value='1988'>1988</option><option value='1989'>1989</option>
                                                                                                <option value='1990'>1990</option><option value='1991'>1991</option><option value='1992'>1992</option>
                                                                                                <option value='1993'>1993</option><option value='1994'>1994</option><option value='1995'>1995</option>
                                                                                                <option value='1996'>1996</option><option value='1997'>1997</option><option value='1998'>1998</option>
                                                                                                <option value='1996'>1996</option><option value='1997'>1997</option><option value='1998'>1998</option>
                                                                                                <option value='1999'>1999</option><option value='2000'>2000</option><option value='2001'>2001</option>
                                                                                                <option value='2002'>2002</option><option value='2003'>2003</option><option value='2004'>2004</option>
                                                                                                <option value='2005'>2005</option><option value='2006'>2006</option><option value='2007'>2007</option>

                                                                                                <option value='2008'>2008</option><option value='2009'>2009</option><option value='2010'>2010</option>

                                                                                                <option value='2011'>2011</option><option value='2012'>2012</option><option value='2013'>2013</option>

                                                                                                <option value='2014'>2014</option><option value='2015'>2015</option>




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
                                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-8">
                                                <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                                            hover:bg-gray-500
                                                            rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Save</button>
                                            </div>

                                            

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