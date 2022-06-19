<template>
<div class="bg-gray-200 w-full h-full">
<div class="flex justify-between">
<Aside />
<div class="w-4/5 h-96">
<Header />
<h1 class="font-bold text-2xl p-4 flex items-center bg-white w-full h-14">Dashborad</h1>
<div class="flex justify-between p-4">
    <div class="bg-white border border-gray-300 rounded-md w-72 h-32 flex items-center justify-center">
    <div class="px-3">
    <p class="text-xl">Product</p>
    <p class="text-3xl">321</p>
    </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="text-[#ffd61f] h-24 w-24" viewBox="0 0 20 20" fill="currentColor">
        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
        </svg>
    </div>
    <div class="bg-white border border-gray-300 rounded-md w-72 h-32 flex items-center justify-center">
    <div class="px-3">
    <p class="text-xl">Users</p>
    <p class="text-3xl">999</p>
    </div>
           <svg xmlns="http://www.w3.org/2000/svg" class="text-[#f50b0b] h-24 w-24" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
            </svg>
    </div>
    <div class="bg-white border border-gray-300 rounded-md w-72 h-32 flex items-center justify-center">
    <div class="px-3">
    <p class="text-xl">Sales</p>
    <p class="text-3xl">321</p>
    </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="text-[#0fe040] h-24 w-24" viewBox="0 0 20 20" fill="currentColor">
            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
        </svg>
    </div>
    <div class="bg-white border border-gray-300 rounded-md w-72 h-32 flex items-center justify-center">
    <div>
    <p class="text-xl">Categories</p>
    <p class="text-3xl">21</p>
    </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="text-[#cb0081] h-24 w-24" viewBox="0 0 20 20" fill="currentColor">
            <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
            </svg>
    </div>
</div>
<section class="container mx-auto p-6 font-mono">
  <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Age</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Date</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <tr class="text-gray-700">
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                  <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold text-black">Sufyan</p>
                  <p class="text-xs text-gray-600">Developer</p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 text-ms font-semibold border">22</td>
            <td class="px-4 py-3 text-xs border">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
            </td>
            <td class="px-4 py-3 text-sm border">6/4/2000</td>
          </tr>
          <tr class="text-gray-700">
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-8 h-8 mr-3 rounded-full">
                  <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold text-black">Stevens</p>
                  <p class="text-xs text-gray-600">Programmer</p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 text-md font-semibold border">27</td>
            <td class="px-4 py-3 text-xs border">
              <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-gray-100 rounded-sm"> Pending </span>
            </td>
            <td class="px-4 py-3 text-sm border">6/10/2020</td>
          </tr>
          <tr class="text-gray-700">
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-8 h-8 mr-3 rounded-full">
                  <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold">Nora</p>
                  <p class="text-xs text-gray-600">Designer</p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 text-md font-semibold border">17</td>
            <td class="px-4 py-3 text-xs border">
              <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"> Nnacceptable </span>
            </td>
            <td class="px-4 py-3 text-sm border">6/10/2020</td>
          </tr>
          <tr class="text-gray-700">
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-8 h-8 mr-3 rounded-full">
                  <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold">Ali</p>
                  <p class="text-xs text-gray-600">Programmer</p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 border text-md font-semibold">23</td>
            <td class="px-4 py-3 border text-xs">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
            </td>
            <td class="px-4 py-3 border text-sm">6/10/2020</td>
          </tr>
          <tr class="text-gray-700">
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-8 h-8 mr-3 rounded-full">
                  <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold">Khalid</p>
                  <p class="text-xs text-gray-600">Designer</p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 border text-md font-semibold">20</td>
            <td class="px-4 py-3 border text-xs">
              <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-sm"> Pending </span>
            </td>
            <td class="px-4 py-3 border text-sm">6/10/2020</td>
          </tr>
          <tr class="text-gray-700">
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-8 h-8 mr-3 rounded-full">
                  <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold">Nasser</p>
                  <p class="text-xs text-gray-600">Pen Tester</p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 border text-md font-semibold">29</td>
            <td class="px-4 py-3 border text-xs">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
            </td>
            <td class="px-4 py-3 border text-sm">6/10/2020</td>
          </tr>
          <tr class="text-gray-700">
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-8 h-8 mr-3 rounded-full">
                  <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold">Mohammed</p>
                  <p class="text-xs text-gray-600">Web Designer</p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 border text-md font-semibold">38</td>
            <td class="px-4 py-3 border text-xs">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
            </td>
            <td class="px-4 py-3 border text-sm">6/10/2020</td>
          </tr>
          <tr class="text-gray-700">
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-8 h-8 mr-3 rounded-full">
                  <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold">Saad</p>
                  <p class="text-xs text-gray-600">Data</p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 border text-md font-semibold">19</td>
            <td class="px-4 py-3 border text-xs">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
            </td>
            <td class="px-4 py-3 border text-sm">6/10/2020</td>
          </tr>
          <tr class="text-gray-700">
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-8 h-8 mr-3 rounded-full">
                  <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                  <p class="font-semibold">Sami</p>
                  <p class="text-xs text-gray-600">Developer</p>
                </div>
              </div>
            </td>
            <td class="px-4 py-3 border text-md font-semibold">21</td>
            <td class="px-4 py-3 border text-xs">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
            </td>
            <td class="px-4 py-3 border text-sm">6/10/2020</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
</div>

</div>

<Footer/>
</div>
</template>
<script>
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
import Aside from './components/Aside.vue';
export default {
    components: {
    Header,
    Footer,
    Aside
},
  data () {
    return {
      tableData: [
        {
          id: 1,
          name: 'Lonzo Steuber',
          company: 'Skiles Ltd',
          city: 'Marilouville',
          progress: 17,
          created: 'Feb 12, 2021'
        },
        {
          id: 2,
          name: 'Jonathon Hahn',
          company: 'Flatley Ltd',
          city: 'Billiemouth',
          progress: 74,
          created: 'Dec 30, 2021'
        },
        {
          id: 3,
          name: 'Ryley Wuckert',
          company: 'Heller-Little',
          city: 'Emeraldtown',
          progress: 54,
          created: 'Jun 28, 2021'
        },
        {
          id: 4,
          name: 'Sienna Hayes',
          company: 'Conn, Jerde and Douglas',
          city: 'Jonathanfort',
          progress: 55,
          created: 'Mar 7, 2021'
        }
      ]
    }
  }
}
</script>
