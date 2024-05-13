<section class="flex mx-auto" style="font-family:'Lato'; font-size:16px; font-weight:350;">
    <div class="hidden md:flex mx-auto">
            <!-- Section A //-->
            <div class="py-2 px-8">
                    <div class='flex flex-col text-center justify-center items-center'>
                        <div class="flex w-12 h-12 rounded-full @if ($section=='A' && $isfilled==false) bg-gray-500 
                                                                @elseif ($section=='A' && $isfilled==true) bg-green-700 
                                                                @elseif ($section!='A' && $isfilled==true) bg-green-300 @else bg-gray-300  @endif  
                                    items-center justify-center text-white font-semibold">
                            A
                        </div>
                    </div>
                    <div class="flex text-center justify-center font-semibold @if ($section=='A') text-gray-500 @else text-gray-300  @endif" >
                        Personal
                    </div>
            </div>
            <!-- end of Section A //-->


            <!-- Section B //-->
            <div class="py-2 px-8">
                    <div class='flex flex-col text-center justify-center items-center'>
                        <div class="flex w-12 h-12 rounded-full @if ($section=='B' && $isfilled==false) bg-gray-500 
                                                                @elseif ($section=='B' && $isfilled==true) bg-green-700 
                                                                @elseif ($section!='B' && $isfilled==true) bg-green-300 @else bg-gray-300  @endif 
                                    items-center justify-center text-white font-semibold">
                            B
                        </div>
                    </div>
                    <div class="flex text-center justify-center font-semibold @if ($section=='B') text-gray-500 @else text-gray-300  @endif">
                        Professional
                    </div>
            </div>
            <!-- end of Section B //-->


            <!-- Section C //-->
            <div class="py-2 px-8">
                    <div class='flex flex-col text-center justify-center items-center'>
                        <div class="flex w-12 h-12 rounded-full @if ($section=='C' && $isfilled==false) bg-gray-500 
                                                                @elseif ($section=='C' && $isfilled==true) bg-green-700 
                                                                @elseif ($section!='C' && $isfilled==true) bg-green-300 @else bg-gray-300  @endif 
                                    items-center justify-center
                                   text-white font-semibold">
                            C
                        </div>
                    </div>
                    <div class="flex text-center justify-center font-semibold @if ($section=='C') text-gray-500 @else text-gray-300  @endif">
                        Passport
                    </div>
            </div>
            <!-- end of Section C //-->


            <!-- Section D //-->
            <div class="py-2 px-8">
                    <div class='flex flex-col text-center justify-center items-center'>
                        <div class="flex w-12 h-12 rounded-full @if ($section=='D') bg-gray-500 @else  bg-gray-300  @endif items-center justify-center
                                   text-white font-semibold">
                            D
                        </div>
                    </div>
                    <div class="flex text-center justify-center font-semibold @if ($section=='D') text-gray-500 @else text-gray-300  @endif">
                        Payment
                    </div>
            </div>
            <!-- end of Section D //-->

             <!-- Section E //-->
             <div class="py-2 px-8">
                    <div class='flex flex-col text-center justify-center items-center'>
                        <div class="flex w-12 h-12 rounded-full @if ($section=='E') bg-gray-500 @else  bg-gray-300  @endif 
                                    items-center justify-center text-white font-semibold">
                            E
                        </div>
                    </div>
                    <div class="flex text-center justify-center font-semibold @if ($section=='E') text-gray-500 @else text-gray-300  @endif">
                        Photograph
                    </div>
            </div>
            <!-- end of Section E //-->

            <!-- Section F //-->
            <div class="py-2 px-8">
                    <div class='flex flex-col text-center justify-center items-center'>
                        <div class="flex w-12 h-12 rounded-full @if ($section=='F') bg-gray-500 @else  bg-gray-300  @endif 
                                    items-center justify-center text-white font-semibold">
                            F
                        </div>
                    </div>
                    <div class="flex text-center justify-center font-semibold @if ($section=='F') text-gray-500 @else text-gray-300  @endif">
                        Signature
                    </div>
            </div>
            <!-- end of Section F //-->

    </div>
    
    
</section>