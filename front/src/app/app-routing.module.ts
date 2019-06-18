import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {LoginComponent} from './login/login.component';
import {RegistrationComponent} from './registration/registration.component';
import {HomePageComponent} from './home-page/home-page.component';
import {PageDetailsComponent} from '../underUnderComponents/page-details/page-details.component';
import {DetailsUserComponent} from './underComponents/details-user/details-user.component';
const routes: Routes = [
  {path: 'users/:id', component: DetailsUserComponent },
  {path: 'pages/:id', component: PageDetailsComponent },
  {path: 'pages', component: HomePageComponent},
  {path: 'login', component: LoginComponent},
  {path: 'registration', component: RegistrationComponent}
];
@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
