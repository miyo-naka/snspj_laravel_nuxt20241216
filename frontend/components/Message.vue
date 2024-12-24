<template>
  <div class="message">
    <div class="message_inner">
      <ul class="message_list">
        <li v-for="post in filteredPosts" :key="post.id">
          <nuxt-link class="nuxt-link" :to="`/posts/${post.id}`">
            <p>
              {{ post.post }}
              <span class="like"
                ><font-awesome-icon :icon="['fas', 'heart']"
              /></span>
              <span class="like_count">1</span>
              <span class="unlike"
                ><font-awesome-icon :icon="['fas', 'circle-xmark']"
              /></span>
              <span class="undo">戻す</span>
            </p>
            <p>{{ post.user.name }}</p>
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
  padding: 0px;
}
.message_list li {
  list-style: none;
}
.message_list li:not(:last-child) {
  border-bottom: 1px solid gray;
}
.message_list a {
  text-decoration: none;
}
.message_list p {
  padding: 5px 10px;
  margin: 0;
}
</style>
