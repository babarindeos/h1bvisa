<x-applicant-layout>
    @include('partials._section_nav')
    <section class="flex flex-row max-full  border-red-900 mb-8">
       
        <div class="flex flex-col w-full md:w-full mx-auto items-center py-4">
            
                
                        <form  action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col mx-auto w-[80%] items-center justify-center">
                            @csrf

                            <div class="flex flex-col w-[80%] md:w-[60%] md:hidden" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                                <h2 class="font-semibold text-xl py-1 text-gray-500" >4 of 6</h2>                                               
                            </div>

                            <div class="flex flex-col w-[80%] md:w-[60%] py-2 md:py-4" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                                <h2 class="font-semibold text-xl py-1" >Payment</h2>
                                Provide details of your offline payment or make payment online. 
                            </div>


                            <div class="flex flex-col w-[80%] md:w-[60%] py-2 mt-2 mb-2" style="font-family:'Lato'; font-size:18px; font-weight:350;">
                                <div class='font-semibold'> Acceptable Fee: &#8358;120,000.00k</div>
                                <div class='text-sm font-medium'>One hundred and twenty thousand naira nil kobo only</div>
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
                            

                            <!-- Offline Payment //-->
                            <div class="flex flex-row w-[80%] md:flex-row md:w-[60%] space-x-3 ">
                                    <input type="radio" name="payment_mode" value="offline" checked/>
                                    <label for="payment_offline" class="font-semibold" style="font-family:'Lato';font-weight:600;">Offline Payment</label>
                                                    
                            </div>
                            <!----------------- offline Payment Section -----------//-->
                            <div class="flex flex-col w-[80%] md:w-[60%]" id="offline_payment_section">

                                    <!-- Payment Name //-->
                                    <div class="flex flex-col border-red-900 w-[100%] md:w-[100%] py-2">
                                    
                                        
                                        <input type="text" name="account_name" class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Payment Name"
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                value="{{$payment->account_name}}"
                                                                                />  
                                                                                                                                                    

                                                                                @error('account_name')
                                                                                    <span class="text-red-700 text-sm">
                                                                                        {{$message}}
                                                                                    </span>
                                                                                @enderror
                                        
                                    </div>
                                    <!-- end of Payment Name //-->


                                    <!-- Bank Name //-->
                                    <div class="flex flex-col border-red-900 w-[100%] md:w-[100%] py-2">
                                    
                                        
                                        <input type="text" name="bank_name" class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Bank Name"
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                value="{{$payment->bank_name}}"
                                                                                />  
                                                                                                                                                    

                                                                                @error('bank_name')
                                                                                    <span class="text-red-700 text-sm">
                                                                                        {{$message}}
                                                                                    </span>
                                                                                @enderror
                                        
                                    </div>
                                    <!-- end of Bank Name//-->


                                    <!-- Account Number //-->
                                    <div class="flex flex-col border-red-900 w-[100%] md:w-[100%] py-2">
                                    
                                        
                                        <input type="text" name="account_number" class="border border-1 border-gray-400 bg-gray-50
                                                                                w-full p-4 rounded-md 
                                                                                focus:outline-none
                                                                                focus:border-blue-500 
                                                                                focus:ring
                                                                                focus:ring-blue-100" placeholder="Account Number"
                                                                                
                                                                                style="font-family:'Lato';font-size:16px;font-weight:500;"                                                                     
                                                                                
                                                                                value="{{$payment->account_number}}"
                                                                                />  
                                                                                                                                                    

                                                                                @error('account_number')
                                                                                    <span class="text-red-700 text-sm">
                                                                                        {{$message}}
                                                                                    </span>
                                                                                @enderror
                                        
                                    </div>
                                    <!-- end of Account Number//-->


                                    <!-- Payment Receipt //-->
                                            
                                    <div class="flex flex-col w-[100%] md:flex-col md:w-[100%] mt-2" >
                                                            
                                                            <label for="day" class="font-semibold" style="font-family:'Lato';">Upload Payment Receipt</label>
                                                            <div style="font-family:'Lato';" class='text-sm'>Upload a picture of the receipt of your payment</div>

                                                            
                                                            <div class='bg-green-100 px-2 py-2 rounded-md mt-1'>
                                                                @if ($payment->receipt!='')
                                                                    <a class="text-sm hover:underline" target='_blank' href="{{asset($payment->receipt)}}">Uploaded Evidence of Payment </a>
                                                                @endif
                                                            </div>
                                    </div>
                                    <div class="flex flex-col border-red-900 w-[100%] md:w-[100%] py-2">
                                            
                                            
                                            <input type="file" name="receipt" class="border border-1 border-gray-400 bg-gray-50
                                                                                    w-full p-4 rounded-md 
                                                                                    focus:outline-none
                                                                                    focus:border-blue-500 
                                                                                    focus:ring
                                                                                    focus:ring-blue-100" 
                                            
                                            style="font-family:'Lato';font-size:16px;font-weight:500;"

                                            />
                                                

                                            @error('receipt')
                                                <span class="text-red-700 text-sm">
                                                    {{$message}}
                                                </span>
                                            @enderror
                                            
                                    </div>                                    
                                    <!-- end of Data Page //-->





                            </div> <!----------------------- end of online payment //----------------------------->



                            <!-- Online Payment //-->
                            <div class="flex flex-row w-[80%] md:flex-row md:w-[60%] space-x-3 mt-4">
                                    <input type="radio" name="payment_mode" value="online" id="online_rad"/>
                                    <label for="payment_online" class="font-semibold" style="font-family:'Lato';font-weight:600;">Pay Online</label>
                                                    
                            </div>
                            <!----------------- online Payment Section -----------//-->
                            <div class="hidden flex-col  w-[80%] md:w-[60%] mb-12 mt-2" id="online_payment_section">
                                    <img src="{{ asset('images/payment_options.png') }}" class="w-64"/>
                                    <div>
                                        <button class="flex flex-row bg-blue-600 text-white 
                                                       py-2 px-4 rounded-md text-sm">Initiate Payment</button>
                                    </div>

                            </div>
                            <!-- -------------- end of online Payment Section ---------- //-->




                            

                           
                           
                             
                            <!-- submit button //-->
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] mt-8">
                                <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                               hover:bg-gray-500
                                               rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Save</button>
                            </div>

                            <!-- previous and next navigation //-->
                            <div class="flex flex-row md:flex-row justify-end items-end w-[80%] md:w-[60%] mt-2 space-x-2">
                                
                                <div class="flex">
                                    <a href="{{ route('application.passport')}}" class=" bg-green-400 py-4 px-4 text-white 
                                    hover:bg-green-500
                                    rounded-l-lg text-base" style="font-family:'Lato';font-weight:500;">Previous</a>
                                </div>

                                @if ($isfilled->payment)
                                    <div class="flex">
                                            <a href="{{ route('application.photograph')}}" class=" bg-green-400 py-4 px-4 text-white 
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
        $("input[type=radio][name=payment_mode]").change(function(){
            var selected_value = $(this).val();
            


            if (selected_value == "online"){
                $("#online_payment_section").slideToggle();
                $("#offline_payment_section").slideToggle();
            }

            if (selected_value == "offline"){
                $("#offline_payment_section").slideToggle();
                $("#online_payment_section").slideToggle();
            }           

        });

        
    });
</script>