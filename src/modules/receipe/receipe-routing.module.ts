/* tslint:disable: ordered-imports*/
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { SBRouteData } from '@modules/navigation/models';

/* Module */
import { ReceipeModule } from './receipe.module';

/* Containers */
import * as receipeContainers from './containers';

/* Containers */
import {IngredientsComponent,RecipeCalculateComponent} from './components';

/* Guards */
import * as receipeGuards from './guards';

/* Routes */
export const ROUTES: Routes = [
    {
        path: 'ingredients',
        canActivate: [],
        component: IngredientsComponent,
        data: {
            title: 'Ingredients'
        } as SBRouteData,
    },
    {
        path: 'receipe',
        canActivate: [],
        component: receipeContainers.ReceipeComponent,
        data: {
            title: 'Receipe'
        } as SBRouteData,
    },
    {
        path: 'recipeCalculate',
        canActivate: [],
        component: RecipeCalculateComponent,
        data: {
            title: 'Recipe Calculate'
        } as SBRouteData,
    },
];

@NgModule({
    imports: [ReceipeModule, RouterModule.forChild(ROUTES)],
    exports: [RouterModule],
})
export class ReceipeRoutingModule {}
