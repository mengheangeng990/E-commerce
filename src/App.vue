<template>

    <div class="listContainer">
      <div class="categoryList">
        <CategoryCard
        v-for="product in products"
        :key="product.name"
        :image="product.image"
        :name="product.name"
        :quantity="product.quantity"
        :bgColor="product.bgColor"
        :borderColor="product.borderColor"
        />
      </div>
    </div>

    <div class="secondContainer">

      <div class="promotionList">
        <PromotionCard
        v-for="promotion in promotions"
        :key="promotion.id"
        :Description="promotion.Description"
        :image="promotion.image"
        :bgcolor="promotion.bgcolor"
        :buttonText="promotion.buttonText"
        :buttonColor="promotion.buttonColor"
        />

      </div>

    </div>

</template>

<script lang="ts">
import axios from 'axios';
import CategoryCard from './components/category.vue';
import PromotionCard from './components/Promotion.vue';
import ButtonCard from './components/Button.vue';

import Hamburger from '@/assets/Hamburger.png';
import Peach from '@/assets/Peach.png';
import Kiwi from '@/assets/Kiwi.png';
import Apple from '@/assets/Apple.png';
import Snack from '@/assets/Snack.png';
import BlackPlum from '@/assets/BlueBerry.png';
import Vegetable from '@/assets/Vegetable.png';
import Headphone from '@/assets/Headphones.png';
import Cake from '@/assets/Cake.png';
import Orange from '@/assets/Orange.png';

import onion from '@/assets/onion.png';
import strawberryJuice from '@/assets/strawberry-juice.png';
import mixed_vegetable from '@/assets/mixed-vegetable.png';

export default {
  name: 'App',
  components: {
    CategoryCard,
    PromotionCard
  },

  data() {
    return {
      products: [
        {image: Hamburger, name: 'Cake & Milk', quantity: '14 Items', bgColor: '#F2FCE4', borderColor: '#81B13D'},
        {image: Peach, name: 'Peach', quantity: '17 Items', bgColor: '#FFFCEB', borderColor: '#81B13D'},
        {image: Kiwi, name: 'Organic Kiwi', quantity: '12 Items', bgColor: '#ECFFEC', borderColor: '#81B13D'},
        {image: Apple, name: 'Red Apple', quantity: '20 Items', bgColor: '#FEEFEA', borderColor: '#81B13D'},
        {image: Snack, name: 'Snack', quantity: '10 Items', bgColor: '#FFF3EB', borderColor: '#81B13D'},
        {image: BlackPlum, name: 'Black Plum', quantity: '8 Items', bgColor: '#FFF3FF', borderColor: '#81B13D'},
        {image: Vegetable, name: 'Vegetable', quantity: '15 Items', bgColor: '#F2FCE4', borderColor: '#81B13D'},
        {image: Headphone, name: 'Headphone', quantity: '9 Items', bgColor: '#FFFCEB', borderColor: '#81B13D'},
        {image: Cake, name: 'Cake', quantity: '11 Items', bgColor: '#F2FCE4', borderColor: '#81B13D'},
        {image: Orange, name: 'Orange', quantity: '13 Items', bgColor: '#FFF3FF', borderColor: '#81B13D'},
      ],

      promotions: [
        {id: 1, Description: 'Everyday Fresh & Clean with Our Products', image: onion, bgcolor: '#F0E8D5', buttonText: 'Shop Now →', buttonColor: '#3BB77E'},
        {id: 2, Description: 'Make your Breakfast Healthy and Easy', image: strawberryJuice, bgcolor: '#F3E8E8', buttonText: 'Shop Now →', buttonColor: '#3BB77E'},
        {id: 3, Description: 'The best Organic Products Online', image: mixed_vegetable, bgcolor: '#E7EAF3', buttonText: 'Shop Now →', buttonColor: '#FDC040'},
      ]

    };
  },

  methods: {
    async fetchCategories() {
        try {
            const response = await axios.get('http://localhost:3000/api/categories');
            this.products = response.data;
        } catch (error) {
            console.error('Error fetching categories:', error);
        }
    },

    async fetchPromotions() {
        try {
            const response = await axios.get('http://localhost:3000/api/promotions');
            this.promotions = response.data;
        } catch (error) {
            console.error('Error fetching promotions:', error);
        }
    }
},
  mounted() {
      // Mounted life cycle - It will be executed every time
      // this component is loaded
      this.fetchCategories();
      this.fetchPromotions();
  }
};

</script>

<style scoped>

.listContainer {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  margin-top: 10%;
}

.categoryList {
  display: flex;
  flex-wrap: nowrap;
  gap: 10px;
  padding: 0 0.5rem;
  justify-content: flex-start;
}

.secondContainer {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  margin: 50px 0px;
}

.promotionList {
  display: flex;
  flex-wrap: nowrap;
  gap: 30px;
  padding: 0 0.5rem;
}
</style>
