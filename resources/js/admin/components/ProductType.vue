
<template>
    <div>
        <div class="flex items-center mb-5">
            <label for="name" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">RAM:</label>
            <div class="w-[140px]">
            <select v-model="telephone[0].value" class="h-full rounded border border-gray-300 w-full">
             <option value="1">1 GB</option>
                <option value="2">2 GB</option>
                <option value="3">3 GB</option>
                <option value="4">4 GB</option>
                <option value="8">8 GB</option>
                <option value="16">16 GB</option>
            </select>
            </div>
            <label for="name" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">Memory:</label>
            <div class="w-[140px]">
            <select v-model="telephone[1].value" class="rounded border border-gray-300 w-full">
                <option value="16">16</option>
                <option value="32">32</option>
                <option value="64">64</option>
                <option value="128">128</option>
                <option value="256">256</option>
                <option value="512">512</option>
            </select>
                </div>
               </div>
        <div class="flex items-center mb-5">
            <label for="" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">Colors:</label>
           <div class="inline-block w-96">
          <select v-model="telephone[2].value" class="rounded border border-gray-300 w-full">
                <option value="black">Black</option>
                <option value="white">White</option>
                <option value="red">Red</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
          </select>
           </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            earmuff: [
                {
                    value: '',
                    type: 'color',
                }
            ],
            telephone: [
               {
                   value: '',
                   type: 'ram'
               },
               {
                    value: '',
                    type: 'memory'
                },
                {
                     value: '',
                     type: 'color'
               }
            ],
        }
    },
}
</script>
