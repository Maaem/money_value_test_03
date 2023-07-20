<script>
import { ref, onMounted } from 'vue'
import axios from 'axios';

const user = ref();
onMounted(async () => {
    try {
        const data = await axios.get('/API/api/user');
        console.log('Response data:', response.data);
        user.value = response.data; // Mettez à jour la variable réactive "user" avec les données de la réponse
    } catch (error) {
        console.error('Error:', error);
    }
});
</script>

<template>
  <div>
    <h1>Home Component</h1>
    <!-- Utilisez la variable réactive "user" dans votre template -->
    <pre>{{ user }}</pre>
  </div>
</template>
