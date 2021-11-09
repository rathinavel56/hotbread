import {
    ChangeDetectionStrategy,
    Component,
    ElementRef,
    OnInit,
    ViewChild,
} from '@angular/core';

@Component({
    selector: 'sb-recipe-calculate',
    changeDetection: ChangeDetectionStrategy.OnPush,
    templateUrl: './recipe-calculate.component.html',
    styleUrls: ['recipe-calculate.component.scss'],
})
export class RecipeCalculateComponent implements OnInit {

    constructor() {}
    ngOnInit() {}
}
