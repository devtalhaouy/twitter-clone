<template>
      <div class="py-6">
          <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
              <form @submit.prevent="tweetStore">
                  <textarea class="rounded-lg border border-gray-200 w-full px-2 font-semibold resize-none focus:outline-none" placeholder="add Your tweet Here" v-model="content"></textarea>
                  <!-- error message -->
                  <div class="flex items-center space-x-4 justify-end m-3">
                      <p :class="{'text-red-500':remainChars<0}" class="text-sm font-thin text-gray-500">
                          {{ remainChars }}  Letters remain
                      </p>
                    <jet-button :disabled="!submitIt"  type="submit" class="bg-blue-400 hover:bg-blue-600 rounded-full font-extrabold btn">Tweet</jet-button>

                  </div>
              </form>
          </div>
       </div>
</template>

<script>
 import JetButton from '@/Jetstream/Button'

export default {
  components: { JetButton },
  data(){
    return{
        content : '',
        limit: 288,
        submit: true
      
    }
  },
  methods:{
    tweetStore(){
     this.$inertia.post('tweets',{ content: this.content },{preserveState: false})
    }
  },
  computed:{
    remainChars(){
      return this.limit - this.content.length
    },
    submitIt(){
      return this.content.length && this.remainChars >=0
    }
  }

}
</script>
<style scoped>
.btn:disabled{
  opacity: 50%;
  cursor: not-allowed;
}
</style>