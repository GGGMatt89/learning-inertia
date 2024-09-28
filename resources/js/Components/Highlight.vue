<script setup>
import {useClipboard} from "@/Composables/useClipboard.js";
import {highlightElement} from "@/Services/SyntaxHighlight";
import {onMounted, ref} from "vue";
let props = defineProps( {
    code: String
})
onMounted( () => {
    highlightElement(block.value);
});
let block = ref(null);

let {copy, copied, supported} = useClipboard(props.code);

</script>

<template>

    <div class="flex flex-col gap-0">
        <header v-if="supported" class="bg-gray-800 text-white flex justify-end px-2 py-1 text-xs border-b border-gray-700">
            <button class="hover:bg-gray-600 rounded px-2" @click="copy">{{copied ? 'Copied' : 'Copy'}}</button>
        </header>
        <pre>
            <code ref="block">
                {{code}}
            </code>
        </pre>
    </div>

</template>


