import Home from './components/theme/Home';
import Single from './components/theme/Single';
import TagPosts from './components/theme/TagPosts';

export default{
	mode: 'history',
	routes: [
		{
			path: '/',
			component: Home,
			name: 'home'
		},
		{
			path:'/tags/:slug',
			component:TagPosts
		},
		{
			path:'/:slug',
			component: Single
		},
		
	]
}
