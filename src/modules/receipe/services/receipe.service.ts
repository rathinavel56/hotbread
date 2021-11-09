import { Injectable } from '@angular/core';
import { Observable, of } from 'rxjs';

@Injectable()
export class ReceipeService {
    constructor() {}

    getIngredients(): Observable<[{}]> {
        return of([{}]);
    }
}
