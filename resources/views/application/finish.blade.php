<x-applicant-layout>

    @if ($error)
            <section class="mb-8 mt-4">
                <div class="flex flex-col w-60% md:w-[50%] mx-auto items-center py-4 px-8 md:px-4" 
                    style="font-family:'Lato'">
                        <h1 class='text-2xl font-bold text-center'>Sorry! You have unfilled sections on the Application Form</h1>
                        <h2 class='text-center mt-4 text-lg'> 
                                    
                                    {!! $message !!}
                                    
                            
                            <div class="mt-4 text-lg">Please fill the above required section. </div>
                        </h2>

                        <div class="py-8 flex flex-row space-x-2">
                            <a href="{{ route('application.signature')}}" class="bg-blue-600 hover:bg-blue-500 rounded-l-lg px-4 py-4 text-white">Back</a>

                            

                        </div>

                </div>
            </section>


    @else
            <section class="mb-8 mt-4">
                <div class="flex flex-col w-60% md:w-[50%] mx-auto items-center py-4 px-8 md:px-4" 
                    style="font-family:'Lato'">
                        <h1 class='text-2xl font-bold text-center'>Almost Done! You have filled all the sections of the Application Form</h1>
                        <h2 class='text-center mt-4 text-lg'> 
                            Please review your submissions before finalizing your application. Once the 
                            application form is submitted, you will not be able to make any further 
                            edits or recall it.
                            <div class="mt-2 text-lg">Thank you for your cooperation. </div>
                        </h2>

                        <div class="py-8 flex flex-row space-x-2">
                            <a href="{{ route('application.signature')}}" class="bg-blue-600 hover:bg-blue-500 rounded-l-lg px-4 py-4 text-white">Back</a>
                            <form method="post" action="{{ route('application.finalize') }}" >
                                 @csrf
                                 <button type="submit" class="bg-green-600 hover:bg-green-500 rounded-r-lg px-4 py-4 text-white">Submit Application Form</button>
                            </form>
                        </div>

                </div>
            </section>
    @endif

</x-applicant-layout>