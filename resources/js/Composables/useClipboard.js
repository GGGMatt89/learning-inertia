import {ref} from "vue";

export function useClipboard(text){

    let copied = ref(false);

    let supported = navigator && 'clipboard' in navigator;

    let copy = () => {
        if(supported) {
            navigator.clipboard.writeText(text);

            copied.value = true;

            return;
        }

        alert('Your browser does not support ClipBoard API!');
    };

    return {copy, copied, supported};
}
