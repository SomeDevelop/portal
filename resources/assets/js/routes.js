import Students from './components/Students.vue';

export const routes = [
    {

        path: '/',
        component: Students
    },
    // {
    //     path: '/login',
    //     component: Login
    // },
    // {
    //     path: '/customers',
    //     component: CustomersMain,
    //     meta: {
    //         requiresAuth: true
    //     },
    //     children: [
    //         {
    //             path: '/',
    //             component: CustomersList
    //         },
    //         {
    //             path: 'new',
    //             component: NewCustomer
    //         },
    //         {
    //             path: ':id',
    //             component: Customer
    //         }
    //     ]
    // }
];