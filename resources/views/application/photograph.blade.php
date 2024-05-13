<x-applicant-layout>
    @include('partials._section_nav')
    <section class="flex flex-row max-full  border-red-900 mb-8">
       
        <div class="flex flex-col w-full md:w-full mx-auto items-center py-4">
            
                
                        <form  action="{{ route('photograph.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col mx-auto w-[80%] items-center justify-center">
                            @csrf

                            <div class="flex flex-col w-[80%] md:w-[60%] md:hidden" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                                <h2 class="font-semibold text-xl py-1 text-gray-500" >5 of 6</h2>                                               
                            </div>

                            <div class="flex flex-col w-[80%] md:w-[60%] py-2 md:py-4" style="font-family:'Lato'; font-size:18px; font-weight:400;">
                                <h2 class="font-semibold text-xl py-1" >Photograph</h2>
                                Upload a clear passport photograph. 
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
                            




                            <!-- Photo //-->
                            
                            <div class="flex flex-col w-[80%] md:flex-col md:w-[60%] mt-2" >
                                                    
                                                        <label for="photo" class="font-semibold" style="font-family:'Lato';">Upload Photograph</label>
                                                        <div style="font-family:'Lato';" class='text-sm'>Upload your passport photograph</div>

                                                        <div class='bg-green-100 px-2 py-2 rounded-md mt-2'>
                                                            @if ($photograph->photo!='')
                                                                <a class="text-sm hover:underline" target='_blank' href="{{asset($photograph->photo)}}">Uploaded Photograph </a>
                                                            @endif
                                                        </div>
                            </div>
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] py-2">
                                
                                
                                <input type="file" name="photo" class="border border-1 border-gray-400 bg-gray-50
                                                                         w-full p-4 rounded-md 
                                                                         focus:outline-none
                                                                         focus:border-blue-500 
                                                                         focus:ring
                                                                         focus:ring-blue-100" 
                                  
                                 style="font-family:'Lato';font-size:16px;font-weight:500;"
                                 accept="image/*"
                                 required />
                                    

                                 @error('photo')
                                    <span class="text-red-700 text-sm">
                                        {{$message}}
                                    </span>
                                 @enderror
                                
                            </div>
                           
                            <!-- end of Photo //-->


                            
                           
                             
                            <!-- submit button //-->
                            <div class="flex flex-col border-red-900 w-[80%] md:w-[60%] mt-8">
                                <button type="submit" class="border border-1 bg-gray-400 py-4 text-white 
                                               hover:bg-gray-500
                                               rounded-md text-lg" style="font-family:'Lato';font-weight:500;">Save</button>
                            </div>

                            

                            <!-- previous and next navigation //-->
                            <div class="flex flex-row md:flex-row justify-end items-end w-[80%] md:w-[60%] mt-2 space-x-2">
                                
                                <div class="flex">
                                    <a href="{{ route('application.payment')}}" class=" bg-green-400 py-4 px-4 text-white 
                                    hover:bg-green-500
                                    rounded-l-lg text-base" style="font-family:'Lato';font-weight:500;">Previous</a>
                                </div>

                                @if ($isfilled->payment)
                                    <div class="flex">
                                            <a href="{{ route('application.signature')}}" class=" bg-green-400 py-4 px-4 text-white 
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