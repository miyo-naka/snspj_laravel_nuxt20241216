<template>
  <div class="message">
    <div>
      <div class="message_title">
        <ul>
          <li v-for="post in posts" :key="post.id">
            {{ post.post }}
            <span class="like">♡</span>
            <span class="like_count">1</span>
            <span class="unlike">✖</span>
            <span class="undo">戻す</span>
          </li>
        </ul>
      </div>
      <p>test message</p>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      posts: [],
    };
  },
  methods: {
    async getPosts() {
      const resPosts = await axios.get("http://localhost:8000/api/posts");
      this.posts = resPosts.data.data;
      console.log("getPosts data:", resPosts.data);
    },
  },
  created() {
    this.getPosts();
  },
};
</script>

<style scoped>
.message {
  border: 1px solid gray;
  padding: 10px;
  margin: 0;
  border-top: none;
}
</style>
