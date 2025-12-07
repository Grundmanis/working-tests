<x-web-layout>




                
                <!-- Navigation Block -->
                <div class="bg-white mt-8 shadow-md rounded-lg px-6 py-4 mb-8 flex flex-col md:flex-row md:items-center md:justify-between border border-gray-100">
                  <!-- Breadcrumbs -->
                  <nav class="text-sm text-gray-500 mb-3 md:mb-0">
                  <ol class="list-reset flex flex-wrap items-center">
                      <li>
                      <a href="/" class="text-blue-600 hover:underline font-medium">Events</a>
                      </li>
                      <li><span class="mx-2 text-gray-400">/</span></li>
                      <li>
                      <a href="/people" class="text-blue-600 hover:underline font-medium">My People</a>
                      </li>
                      <li><span class="mx-2 text-gray-400">/</span></li>
                      <li class="text-gray-700 font-semibold">Edit</li>
                  </ol>
                  </nav>
              </div>
    
              <div class="items-center w-full bg-white rounded-lg shadow-md mt-8 mb-8">
                <div class="mx-auto">
                  <div class="overflow-x-auto">
          
                      <div class="mx-auto bg-white p-8">
                          <h2 class="text-2xl font-semibold text-gray-800 mb-6">Handler/Owner</h2>
                        
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                              <label class="block text-gray-700 font-medium mb-2">First Name</label>
                              <input type="text" x-model="dogInfo.name"
                                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                            </div>
                        
                            <div>
                              <label class="block text-gray-700 font-medium mb-2">Last Name</label>
                              <input type="text" x-model="dogInfo.homeName"
                                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                            </div>
                        
                            <div>
                              <label class="block text-gray-700 font-medium mb-2">E-mail address</label>
                              <input type="text" x-model="dogInfo.regNumber"
                                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                            </div>
                        
                            <div>
                              <label class="block text-gray-700 font-medium mb-2">Phone number</label>
                              <input type="text" x-model="dogInfo.microchip"
                                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                            </div>
                        
                            <div>
                              <label class="block text-gray-700 font-medium mb-2">Address</label>
                              <input x-model="dogInfo.dob"
                                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" />
                            </div>
                          </div>
                        
                          <div class="mt-8 flex justify-end">
                            <button type="submit"
                                    class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                              Save
                            </button>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
    
    
    
</x-web-layout>
