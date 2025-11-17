<div x-data="checkAll">
    <input x-ref="checkbox" @change="handleCheck" type="checkbox" class="rounded border-gray-300 shadow">
</div>

@script
<script>
    Alpine.data('checkAll', () => {
        return {
            init() {
                this.$wire.$watch('selectedOrderIds', () => {
                    this.updateCheckAllState()
                })

                this.$wire.$watch('orderIdsOnPage', () => {
                    this.updateCheckAllState()
                })
            },

            updateCheckAllState() {
                if (this.pageIsSelected()) {
                    this.$refs.checkbox.checked = true
                    this.$refs.checkbox.indeterminate = false
                } else if (this.pageIsEmpty()) {
                    this.$refs.checkbox.checked = false
                    this.$refs.checkbox.indeterminate = false
                } else {
                    this.$refs.checkbox.checked = false
                    this.$refs.checkbox.indeterminate = true
                }
            },

            pageIsSelected() {
                return this.$wire.orderIdsOnPage.every(id => this.$wire.selectedOrderIds.includes(id))
            },

            pageIsEmpty() {
                return this.$wire.selectedOrderIds.length === 0
            },

            handleCheck(e) {
                e.target.checked ? this.selectAll() : this.deselectAll()
            },

            selectAll() {
                this.$wire.orderIdsOnPage.forEach(id => {
                    if (this.$wire.selectedOrderIds.includes(id)) return

                    this.$wire.selectedOrderIds.push(id)
                })
            },

            deselectAll() {
                this.$wire.selectedOrderIds = []
            },
        }
    })
</script>
@endscript
