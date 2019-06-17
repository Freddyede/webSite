import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {LoginComponent} from './login/login.component';
import {RegistrationComponent} from './registration/registration.component';
import {HomePageComponent} from './home-page/home-page.component';
const routes: Routes = [
  {path: 'homepage', component: HomePageComponent},
  {path: 'login', component: LoginComponent},
  {path: 'registration', component: RegistrationComponent}
];
@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
