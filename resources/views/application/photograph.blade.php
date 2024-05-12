<x-applicant-layout>
    @include('partials._section_nav')
    <section class="flex flex-row max-full  border-red-900 mb-8">
       
        <div class="flex flex-col w-full md:w-full mx-auto items-center py-4">
            
                
                        <form  action="{{ route('pre-registration.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col mx-auto w-[80%] items-center justify-center">
                            @csrf

                            <div class="flex flex-col w-[80%] md:w-[60%] py-4 mt-4" style="font-family:'Lato'; font-size:18px; font-weight:350;">
                                <h2 class="font-semibold text-xl py-1" >Photograph</h2>
                                Upload a clear passport photograph. 
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
                            




                            <!-- Data Page //-->
                            
                            <div class="flex flex-col w-[80%] md:flex-col md:w-[60%] mt-2" >
                                                    
                                                        <label for="day" class="font-semibold" style="font-family:'Lato';">Upload Photograph</label>
                                                        <div style="font-family:'Lato';" class='text-sm'>Upload your passport photograph</div>
                                                    
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