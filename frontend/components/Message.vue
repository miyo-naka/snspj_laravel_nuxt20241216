<template>
  <div class="message">
    <div class="message_inner">
      <ul class="message_list">
        <li v-for="post in filteredPosts" :key="post.id">
          <nuxt-link :to="`/posts/${post.id}`">
            {{ post.post }}
            <span class="like">♡</span>
            <span class="like_count">1</span>
            <span class="unlike">✖</span>
            <span class="undo">戻す</span><br />
            {{ post.user.name }}
          </nuxt-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: {
    postId: { type: [Number, String], required: false, default: null }, // postIdを受け取る
  },
  data() {
    return {
      posts: [],
    };
  },
  computed: {
    // postIdがある場合はフィルタリングする
    filteredPosts() {
      if (this.postId) {
        return this.posts.filter((post) => post.id == this.postId);
      }
      return this.posts; // postIdがない場合は全て表示
    },
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
  margin: 0;
  border-top: none;
}
.message_list {
  margin: 0;
  padding: 10px;
}
.message_list li {
  list-style: none;
}
.message_list a {
  text-decoration: none;
}
</style>
