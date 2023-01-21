<template>
  <section class="section">
    <div class="container">
      <h1 class="title">Book Information</h1>
      
      <button @click="getBooks()">Show Books</button>

      <br>
      <br>

      <div class="columns">

        <div class="column is-4"  v-for="book in books">
          <div class="card">
            <div class="card-image">
                <img :src="book.image_url" alt="Placeholder image" width="200" height="200">
            </div>
            <div class="card-content">
              <p>{{ book.name}}</p>
              <div class="content">
                
                <a href="#">#css</a> <a href="#">Author: {{ book.author}}</a>
                <br>
                <p>Price : ${{ book.price }}</p>
              </div>
            </div>
          </div>
        </div>

    
      </div>








    </div>
    


  </section>
</template>

<script>
import Notification from '../components/Notifaction.vue'

export default {
  components: {
    Notification,
  },

  data() {
    return {
      books: [],
      error: null
    }
  },
  methods: {
    async getBooks() {
        // alert('asd');
        
        try {
          await this.$axios.get('books').then(response => {
            console.log(response.data);
            this.books = response.data.data;

          });

        } catch (e) {
          this.error = e.response.data.message
        }
      }
  }


}
</script>
