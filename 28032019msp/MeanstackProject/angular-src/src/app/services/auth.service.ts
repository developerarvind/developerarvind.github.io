import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';
import { map } from 'rxjs/operators';
import { JwtHelperService } from '@auth0/angular-jwt';
import { getLocaleExtraDayPeriodRules } from '@angular/common';

// let request = require('./request');
const helper = new JwtHelperService();

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  authToken:any;
  user:any;
  constructor(private http:Http) { }

  registerUser(user){
    let headers = new Headers();
    headers.append('Content-Type','application/json');
    return this.http.post('http://103.205.66.36:3030/api/auth/login',user,{headers:headers})
    .pipe(map((response: any) => response.json()));
  }

  authenticateUser(user){
    let headers = new Headers();
let url = 'http://103.205.66.36:3030/api/auth/login';
let body = 'body';
let timeout = '8000';

// request.calldesignApiwithHeader ( url, body, headers, timeout);

    headers.append('Content-Type','application/json');
    return this.http.post('http://103.205.66.36:3030/api/auth/login',user, {headers:headers})
    .pipe(map((response: any) => response.json()));
  }

  getProfile(){
    let headers = new Headers();
    this.loadToken();
    headers.append('Authorization',this.authToken);
    headers.append('Content-Type','application/json');
    return this.http.get('http://103.205.66.36:3030/api/auth/login',{headers:headers})
    .pipe(map((response: any) => response.json()));
  }

  storeUserData(token,user){
    localStorage.setItem('id_token',token);
    localStorage.setItem('user', JSON.stringify(user));
    this.authToken = token;
    this.user = user;
  }

  loggedIn(){
    return helper.isTokenExpired(localStorage.getItem('id_token'));
  }

  loadToken(){
    const token = localStorage.getItem('id_token');
    this.authToken = token;
  }

  logout(){
    this.authToken = null;
    this.user = null;
    localStorage.clear();
  }

}
