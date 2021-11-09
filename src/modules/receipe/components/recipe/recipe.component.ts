import {
    ChangeDetectionStrategy,
    Component,
    ElementRef,
    OnInit,
    ViewChild,
} from '@angular/core';

@Component({
    selector: 'sb-recipe',
    changeDetection: ChangeDetectionStrategy.OnPush,
    templateUrl: './recipe.component.html',
    styleUrls: ['recipe.component.scss'],
})
export class RecipeComponent implements OnInit {
   
    constructor() {}
    ngOnInit() {}
}
