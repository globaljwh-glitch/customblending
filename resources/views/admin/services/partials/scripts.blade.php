<script>
    /*let bbIndex = 0, pmIndex = 0, indIndex = 0;

    function addBlackBox(item = {}) {
        document.getElementById('black-box-wrapper').insertAdjacentHTML('beforeend', `
            <div class="border p-3 mb-3 rounded">
                <input name="black_box[${bbIndex}][title1]" value="${item.title1 ?? ''}"
                       placeholder="Title 1" class="w-full mb-2 border rounded">

                <input name="black_box[${bbIndex}][title2]" value="${item.title2 ?? ''}"
                       placeholder="Title 2" class="w-full mb-2 border rounded">

                <textarea name="black_box[${bbIndex}][description]"
                          placeholder="Description"
                          class="w-full mb-2 border rounded">${item.description ?? ''}</textarea>

                <button type="button" onclick="this.parentElement.remove()"
                        class="text-red-600 text-sm">Remove</button>
            </div>
        `);
        bbIndex++;
    }

    function addPlusMinus(item = {}) {
        document.getElementById('plus-minus-wrapper').insertAdjacentHTML('beforeend', `
            <div class="border p-3 mb-3 rounded">
                <input name="plus_minus[${pmIndex}][title]" value="${item.title ?? ''}"
                       placeholder="Title" class="w-full mb-2 border rounded">

                <textarea name="plus_minus[${pmIndex}][description]"
                          placeholder="Description"
                          class="w-full mb-2 border rounded">${item.description ?? ''}</textarea>

                <button type="button" onclick="this.parentElement.remove()"
                        class="text-red-600 text-sm">Remove</button>
            </div>
        `);
        pmIndex++;
    }

    function addIndustryItem(item = {}) {
        document.getElementById('industry-wrapper').insertAdjacentHTML('beforeend', `
            <div class="border p-3 mb-3 rounded">
                <input name="industry[data][${indIndex}][icon]" value="${item.icon ?? ''}"
                       placeholder="Icon" class="w-full mb-2 border rounded">

                <input name="industry[data][${indIndex}][title]" value="${item.title ?? ''}"
                       placeholder="Title" class="w-full mb-2 border rounded">

                <button type="button" onclick="this.parentElement.remove()"
                        class="text-red-600 text-sm">Remove</button>
            </div>
        `);
        indIndex++;
    }
*/
    document.addEventListener('DOMContentLoaded', () => {
        if (existingData?.black_box) {
            existingData.black_box.forEach(item => addBlackBox(item));
        }

        if (existingData?.plus_minus) {
            existingData.plus_minus.forEach(item => addPlusMinus(item));
        }

        if (existingData?.industry?.data) {
            existingData.industry.data.forEach(item => addIndustryItem(item));
        }
    });

    

</script>

<script>
    let bbIndex = 0, pmIndex = 0, indIndex = 0;

    function addBlackBox(item = {}) {
        document.getElementById('black-box-wrapper').insertAdjacentHTML('beforeend', `
            <div class="border rounded-lg p-4 mb-4 bg-gray-50">
                <h4 class="font-semibold text-gray-700 mb-3">
                    Black Box Item ${bbIndex + 1}
                </h4>

                <div class="mb-2">
                    <label class="block text-sm text-gray-600">Title 1</label>
                    <input name="black_box[${bbIndex}][title1]"
                           value="${item.title1 ?? ''}"
                           class="w-full border rounded px-2 py-1">
                </div>

                <div class="mb-2">
                    <label class="block text-sm text-gray-600">Title 2</label>
                    <input name="black_box[${bbIndex}][title2]"
                           value="${item.title2 ?? ''}"
                           class="w-full border rounded px-2 py-1">
                </div>

                <div class="mb-3">
                    <label class="block text-sm text-gray-600">Description</label>
                    <textarea name="black_box[${bbIndex}][description]"
                              class="w-full border rounded px-2 py-1"
                              rows="3">${item.description ?? ''}</textarea>
                </div>

                <button type="button"
                        onclick="this.closest('.border').remove()"
                        class="text-red-600 text-sm">
                    Remove Black Box
                </button>
            </div>
        `);
        bbIndex++;
    }
</script>

<script>
    function addPlusMinus(item = {}) {
        document.getElementById('plus-minus-wrapper').insertAdjacentHTML('beforeend', `
            <div class="border rounded-lg p-4 mb-4 bg-gray-50">
                <h4 class="font-semibold text-gray-700 mb-3">
                    Plus / Minus Item ${pmIndex + 1}
                </h4>

                <div class="mb-2">
                    <label class="block text-sm text-gray-600">Title</label>
                    <input name="plus_minus[${pmIndex}][title]"
                           value="${item.title ?? ''}"
                           class="w-full border rounded px-2 py-1">
                </div>

                <div class="mb-3">
                    <label class="block text-sm text-gray-600">Description</label>
                    <textarea name="plus_minus[${pmIndex}][description]"
                              class="w-full border rounded px-2 py-1"
                              rows="3">${item.description ?? ''}</textarea>
                </div>

                <button type="button"
                        onclick="this.closest('.border').remove()"
                        class="text-red-600 text-sm">
                    Remove Plus/Minus
                </button>
            </div>
        `);
        pmIndex++;
    }
</script>
<script>
    function addIndustryItem(item = {}) {
        document.getElementById('industry-wrapper').insertAdjacentHTML('beforeend', `
            <div class="border rounded-lg p-4 mb-4 bg-gray-50">
                <h4 class="font-semibold text-gray-700 mb-3">
                    Industry Item ${indIndex + 1}
                </h4>

                <div class="mb-2">
                    <label class="block text-sm text-gray-600">Icon</label>
                    <input name="industry[data][${indIndex}][icon]"
                           value="${item.icon ?? ''}"
                           class="w-full border rounded px-2 py-1">
                </div>

                <div class="mb-3">
                    <label class="block text-sm text-gray-600">Title</label>
                    <input name="industry[data][${indIndex}][title]"
                           value="${item.title ?? ''}"
                           class="w-full border rounded px-2 py-1">
                </div>

                <button type="button"
                        onclick="this.closest('.border').remove()"
                        class="text-red-600 text-sm">
                    Remove Industry
                </button>
            </div>
        `);
        indIndex++;
    }
</script>

